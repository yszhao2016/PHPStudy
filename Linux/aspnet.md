#centos 7 安装调试asp.net程序


rpm -Uvh https://packages.microsoft.com/config/rhel/7/packages-microsoft-prod.rpm

yum install aspnetcore-runtime-3.1

dotnet --info

yum  install dotnet-sdk-3.1


dotnet new console -o myApp

dotnet run