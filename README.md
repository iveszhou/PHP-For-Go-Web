# PHP-For-Go-Web
��php+bootstrap3��������Go Web ��̡���md�ļ����������ػ���Զ����վ��������Ҳ���õ����ҵ������ˡ�

- ��https://github.com/astaxie/build-web-application-with-golang/tree/master/zh ��ȡmd�ļ�
- ��https://github.com/erusev/parsedown ��ȡMarkdown��ʽ���ݵ�PHP�������
- ʹ��PHP�����õ�html����
- ʹ��Bootstrap��ʾ���յ�htmlҳ��

�Ҳ��������룬���Ǵ���İ��˹���
չʾվ�㣺http://go.webiji.com

## ��װ����
#### [ Apache ]

    httpd.conf�����ļ��м�����mod_rewrite.soģ��
    AllowOverride None ��None��Ϊ All
    ����������ݱ���Ϊ.htaccess�ļ��ŵ�Ӧ������ļ���ͬ��Ŀ¼��

    <IfModule mod_rewrite.c>
     RewriteEngine on
     RewriteCond %{REQUEST_FILENAME} !-d
     RewriteCond %{REQUEST_FILENAME} !-f
     RewriteRule ^(.*)$ index.php?file=$1 [QSA,PT,L]
    </IfModule>

����Ŀ��wampserver�¿�������ͨ�����ԡ�����ʹ��wampserver������
	
#### [ IIS ]

�����ķ���������֧��ISAPI_Rewrite�Ļ�����������httpd.ini�ļ��������������ݣ�

    RewriteRule (.*)$ /index\.php\?file=$1 [I]

#### [ Nginx ]

ͨ����Nginx.conf������ת������ʵ�֣�

      location / { // ��..ʡ�Բ��ִ���
       if (!-e $request_filename) {
       rewrite  ^(.*)$  /index.php?file=$1  last;
       break;
        }
     }


��������Ŀ��װ�ڶ���Ŀ¼��Nginx��α��̬�����������£�����goweb�����ڵ�Ŀ¼���ơ�

    location /goweb/ {
        if (!-e $request_filename){
            rewrite  ^/goweb/(.*)$  /goweb/index.php?file=$1  last;
        }
    }