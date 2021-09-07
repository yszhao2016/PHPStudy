<?php

$i = 0;
while ($i < 2) {
    $pid = pcntl_fork();
    // 父进程和子进程都会执行以下代码
    if ($pid == -1) { // 创建子进程错误，返回-1
        die('could not fork');
    } else if ($pid) {
        // 父进程会得到子进程号，所以这里是父进程执行的逻辑
        pcntl_wait($status); // 父进程必须等待一个子进程退出后，再创建下一个子进程。

        $cid = $pid; // 子进程的ID
        $pid = posix_getpid(); // pid 与mypid一样，是当前进程Id
        $myid = getmypid();
        $ppid = posix_getppid(); // 进程的父级ID
        $time = microtime(true);
        echo "I am parent cid:$cid   myid:$myid pid:$pid ppid:$ppid i:$i $time \n";
    } else {
        // 子进程得到的$pid 为0，所以这里是子进程的逻辑
        $cid = $pid;
        $pid = posix_getpid();
        $ppid = posix_getppid();
        $myid = getmypid();
        $time = microtime(true);
        echo "I am child cid:$cid   myid:$myid pid:$pid ppid:$ppid i:$i  $time \n";
//        exit;
        //sleep(2);
    }
    $i++;
}


//php -f pcntl_wait.php 运行结果如下：
//
//I am child   cid:0      myid:6499 pid:6499 ppid:6498 i:0  1491394182.2065
//I am child   cid:0      myid:6500 pid:6500 ppid:6499 i:1  1491394182.2077
//I am parent  cid:6500   myid:6499 pid:6499 ppid:6498 i:1  1491394182.2143
//I am parent  cid:6499   myid:6498 pid:6498 ppid:3471 i:0  1491394182.2211
//I am child   cid:0      myid:6501 pid:6501 ppid:6498 i:1  1491394182.222
//I am parent  cid:6501   myid:6498 pid:6498 ppid:3471 i:1  1491394182.2302


//为何是如上运行过程？
//参考了PHP手册和网友blog以上代码能够循环产生子进程，并且父进程会阻塞等待子进程退出，
//这样就产生了一个问题，父进程必须等待一个子进程退出后，再创建另外一个


//个人分析如下：
//
//  1.运行shell命令(该进程ID是3471),生成主进程PID为6498
//
//  开始循环i=0
//
//  6498 此时的父进程
//  |fork
//  6499 父进程(6498阻塞),该子进程(6499)执行 ，输出：child cid:0 myid:6499 pid:6499 ppid:6498 i:0  1491394182.2065
//       然后i++ i=1,再次循环
//继续循环i=1
//
//  6499 此时的父进程
//|fork
//  6500 父进程(6499阻塞),该子进程(6500)执行，输出：child cid:0  myid:6500 pid:6500 ppid:6499 i:1  1491394182.2077
//       然后i++ i=2，本次循环终止,回到其主进程6499
//  6499 解除阻塞，
//       此时i=1(因为阻塞时i=1),继续执行  输出：parent cid:6500  myid:6499 pid:6499 ppid:6498 i:1  1491394182.2143
//       然后i++ i=2,本次循环终止，回到其主进程6498
//  6498 解除阻塞,
//       此时i=0(因为阻塞时i=0),继续执行，输出：parent cid:6499  myid:6498 pid:6498 ppid:3471 i:0  1491394182.2211
//       然后i++ i=1,再次循环
//继续循环i=1
//
//  6498 此时的父进程
//|fork
//  6501 父进程(6498阻塞),该子进程(6501)执行，输出：child cid:0  myid:6501 pid:6501 ppid:6498 i:1  1491394182.222
//       然后i++ i=2,本次循环终止，回到其主进程6498
//  6498 解除阻塞
//       此时i=1(因为阻塞时为i=1),继续执行，输出：parent cid:6501 myid:6498 pid:6498 ppid:3471 i:1  1491394182.2302
//       然后i++ i=2，本次循环终止，回到其主进程3471，最后命令结束。