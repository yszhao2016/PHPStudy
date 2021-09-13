    Server Software:        web服务器软件及版本
    Server Hostname:        表示请求的URL中的主机部分名称
    Server Port:            被测试的Web服务器的监听端口
     
    Document Path:          请求的页面路径
    Document Length:        页面大小
     
    Concurrency Level:      并发数
    Time taken for tests:   测试总共花费的时间
    Complete requests:      完成的请求数
    Failed requests:        失败的请求数，这里的失败是指请求的连接服务器、发送数据、接收数据等环节发生异常，以及无响应后超时的情况。对于超时时间的设置可以用ab的-t参数。如果接受到的http响应数据的头信息中含有2xx以外的状态码，则会在测试结果显示另一个名为“Non-2xx responses”的统计项，用于统计这部分请求数，这些请求并不算是失败的请求。
    Write errors:           写入错误
    Total transferred:      总共传输字节数，包含http的头信息等。使用ab的-v参数即可查看详细的http头信息。
    HTML transferred:       html字节数，实际的页面传递字节数。也就是减去了Total transferred中http响应数据中头信息的长度。
    Requests per second:    每秒处理的请求数，服务器的吞吐量，等于：Complete requests / Time taken for tests
    Time per request:       平均数，用户平均请求等待时间
    Time per request:       服务器平均处理时间
    Transfer rate:          平均传输速率（每秒收到的速率）。可以很好的说明服务器在处理能力达到限制时，其出口带宽的需求量。
 
    Connection Times (ms) 压力测试时的连接处理时间。
                  min  mean[+/-sd] median   max
    Connect:        0   67 398.4      9    3009
    Processing:    49 2904 2327.2   2755   12115
    Waiting:       48 2539 2075.1   2418   12110
    Total:         53 2972 2385.3   2789   12119


2. 测试时出现的Failed requests原因分析：

        Failed requests: 2303
        (Connect: 0, Length: 2303, Exceptions: 0)
        只要出现Failed requests就会多一行数据来统计失败的原因，分别有Connect、Length、Exceptions。
        Connect 无法送出要求、目标主机连接失败、要求的过程中被中断。
        Length 响应的内容长度不一致 ( 以 Content-Length 头值为判断依据 )。
        Exception 发生无法预期的错误。
        
        上图的测试失败请求都落在Length类别上，是因为测试的是PHP动态页面，测试过程中响应的Content-Length大小不一致造成的。有网友说对于动态页面的Length不一致是合理的，可以不予理会。但是我这测试实例是通过PHP来访问图片的，这个响应的大小应该是固定的吧。