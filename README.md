### ระบบตรวจสอบการทำงานเครื่องแม่ข่าย (SERVER)
ระบบนี้ออกแบบมาเพื่อใช้ตรวจสอบการทำงานของเครื่องคอมพิวเตอร์ที่มีการระบุ IP โดยสามารถ Monitor เป็นราย POrt ได้ 

####ขั้นตอนการติดตั้ง
* สร้าง Folder ที่จะใช้ติดตั้งระบบนี้ โดยต้องสร้างในส่วนที่ Web server สามารถ  run ได้ เช่น
  * /var/www/html/HostMonitor
  * c:\xampp\htdocs\hostmonitor
* ทำการ clone หรือ download file จาก repo นี้ ไปไว้ใน Folder ที่สร้างไว้ ยกเว้น folder images เพราะไม่ได้ใช้
* download theme adminLTE จาก https://github.com/almasaeed2010/AdminLTE มาไว้ใน folder AdminLTE
* ทำการแก้ไข config file ใน include/config.php
```javascript
$db = [
        'host'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'port'=>'3306',
        'dbname'=>'monitoring',
        'charset'=>'utf8',
        'socket'=>""
    ];
    $defaultValues = [
        'DefaultMail' =>'email@mail.com',
        'BackTracking' => 30,          //Read Minute
        'TimeOut' => 8,                   //try to check port in Seconds
        'MinuteCheck' => 300,        //duration checking period in seconds
        'screenRefresh' => 300,        //refresh website for new data in Seconds
        'Group'=>'HDC',
        'Home'=>'list'
    ];
```
#### ตัวอย่างหน้าจอที่ใช้ในการ Monitor แบบแผนที่
![GitHub Logo](/images/map_display.png)


