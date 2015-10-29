# PHP-For-Go-Web
用php+bootstrap3来解析《Go Web 编程》的md文件。构建本地或者远程网站。妈妈再也不用担心我的网速了。

- 从https://github.com/astaxie/build-web-application-with-golang/tree/master/zh 获取md文件
- 从https://github.com/erusev/parsedown 获取Markdown格式数据的PHP解析类库
- 使用PHP解析得到html数据
- 使用Bootstrap显示最终的html页面

我不生产代码，我是代码的搬运工！
展示站点：http://go.webiji.com

## 安装配置
#### [ Apache ]

    httpd.conf配置文件中加载了mod_rewrite.so模块
    AllowOverride None 将None改为 All
    把下面的内容保存为.htaccess文件放到应用入口文件的同级目录下

    <IfModule mod_rewrite.c>
     RewriteEngine on
     RewriteCond %{REQUEST_FILENAME} !-d
     RewriteCond %{REQUEST_FILENAME} !-f
     RewriteRule ^(.*)$ index.php?file=$1 [QSA,PT,L]
    </IfModule>

本项目在wampserver下开发并且通过测试。建议使用wampserver环境。
	
#### [ IIS ]

如果你的服务器环境支持ISAPI_Rewrite的话，可以配置httpd.ini文件，添加下面的内容：

    RewriteRule (.*)$ /index\.php\?file=$1 [I]

#### [ Nginx ]

通过在Nginx.conf中配置转发规则实现：

      location / { // …..省略部分代码
       if (!-e $request_filename) {
       rewrite  ^(.*)$  /index.php?file=$1  last;
       break;
        }
     }


如果你的项目安装在二级目录，Nginx的伪静态方法设置如下，其中goweb是所在的目录名称。

    location /goweb/ {
        if (!-e $request_filename){
            rewrite  ^/goweb/(.*)$  /goweb/index.php?file=$1  last;
        }
    }