#Host Alive v.1.02b
### ระบบตรวจสอบการทำงานเครื่องแม่ข่าย (SERVER)
ระบบนี้ออกแบบมาเพื่อใช้ตรวจสอบการทำงานของเครื่องคอมพิวเตอร์ที่มีการระบุ IP โดยสามารถ Monitor เป็นราย Port ได้ 

####ขั้นตอนการติดตั้ง
* สร้าง Folder ที่จะใช้ติดตั้งระบบนี้ โดยต้องสร้างในส่วนที่ Web server สามารถ  run ได้ เช่น
  * /var/www/html/HostMonitor
  * c:\xampp\htdocs\hostmonitor
* ทำการ clone หรือ download file จาก repo นี้ ไปไว้ใน Folder ที่สร้างไว้ ยกเว้น folder images เพราะไม่ได้ใช้
* download theme adminLTE จาก https://github.com/almasaeed2010/AdminLTE มาไว้ใน folder AdminLTE
* สร้างฐานข้อมูล monitoring หรือชื่ออื่นตามต้องการ จากนั้นให้ run script db.sql ที่อยู่ใน include เพื่อสร้างตาราง
* ทำการแก้ไข config file ใน includ/default_values.php ให้ถูกต้อง
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
        'siteName'=>'HOST Alive',
        'siteVersion'=>'1.02b',                                    // !!! Don't change
        'defaultMail' =>'superpck@yahoo.com',
        'defaultGroup'=>'HDC',
        'backTracking' => 30,            // Read Minute
        'TimeOut' => 8,                       // try to check port in Seconds
        'minuteCheck' => 300,            // duration checking period in seconds
        'screenRefresh' => 300,        // refresh website for new data in Seconds
        'homeUrl'=>'list',
    ];
    $BanedIP = [
        "66.249.",
    ];
    $BanedUrlString = [
        "Google favicon",
        'Bot'
    ];
```
* สร้าง crontab เพื่อ run script php ให้ตรวจสอบ server โดยกำหนดระยะเวลาเองใน crontab 
 * การสร้าง crontab ใน linux
```javascript
 ใช้คำสั่งในการแก้ไข crontab
 $ crontab -e
 เพิ่มบรรทัด
 10,20,30,40,50 * * * * /var/www/html/HostMonitor/host_check.php > /tmp/check_host.log
 
 ความหมายของ command line
 คำสั่งใน crontab   >> นาที ชั่งโมง วันที่ เดือน วันในสัปดาห์ คำสั่ง
 ในทุกๆ นาทีที่ 10,20,30,40,50 *=ทุกชั่วโมง *=ทุกวัน *=ทุกเดือน *=ทุกวันในสัปดาห์ 
```
*
 *..

#### system requirement
* webserver ของ vendor ใดก็ได้
* php version 5.4 ขึ้นไป
* adminLTE version 2.3 ขึ้นไป
* ระบบที่สามารถ run crontab หรือ schedule (windows) ได้
 


#### ตัวอย่างหน้าจอที่ใช้ในการ Monitor แบบแผนที่
![GitHub Logo](/images/map_display.png)


