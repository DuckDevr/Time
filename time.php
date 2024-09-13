
เราสามารถสร้าง Date Object ได้โดยใช้คำสั่งดังนี้ :

// สร้างสำหรับวันที่และเวลาปัจจุบันได้โดยที่ไม่ต้องระบุอะไรในวงเล็บ
let now = new Date(); 

// สามารถระบุวันที่และเวลาที่ต้องการในวงเล็บเพื่อกำหนด วันที่และเวลา ที่ต้องการได้
let currentDate = new Date('2024-04-01'); 

// ตัวอย่างในการระบุ
new Date(year,month)
new Date(year,month,day)
new Date(year,month,day,hours)
new Date(year,month,day,hours,minutes)
new Date(year,month,day,hours,minutes,seconds)
new Date(year,month,day,hours,minutes,seconds,ms)

เมื่อเราสร้างวัตถุที่ได้แล้ว เราสามารถดึงข้อมูลเช่น ปี วัน เดือน ชั่วโมง นาที วินาที 
ออกมาจากวัตถุได้ โดยการใช้ Method ดังนี้ :

let year = currentDate.getFullYear(); // ดึงปีปัจจุบัน
let month = currentDate.getMonth(); // ดึงเดือนปัจจุบัน (0 - 11)
let day = currentDate.getDate(); // ดึงวันที่ปัจจุบัน (1 - 31)
let hours = currentDate.getHours(); // ดึงชั่วโมงปัจจุบัน (0 - 23)
let minutes = currentDate.getMinutes(); // ดึงนาทีปัจจุบัน (0 - 59)
let seconds = currentDate.getSeconds(); // ดึงวินาทีปัจจุบัน (0 - 59)


และเรายังสามารถใช้ Method ‘getTime()’ เพื่อดึงค่าเวลาในรูปแบบของ timestamp

let timestamp = currentDate.getTime(); 

การใช้ timestamp นี้มักจะเป็นวิธีที่สะดวกในการทำงาน



สร้างไฟล์ index.html เนื่องจากเป็นตัวอย่างให้ทุกคนได้เข้าใจง่ายที่สุดนะครับ

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>🎆New year Countdown to 2025</title>
    <!-- ใช้ Tailwind แบบ CND -->
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[#0f172a] text-[#c6c8ce]">
    <!-- Content -->
    <div class="grid place-content-center justify-items-center gap-10 h-screen">
      <h1 id="hny" class="text-8xl font-mono font-bold">New year Countdown to 2025</h1>
      <div id="countdown" class="font-mono text-5xl">
        <span id="days">0 </span>days <span id="min">0 </span>hours
        <span id="hours">0 </span>min <span id="sec">0 </span>sec
      </div>
    </div>
    <!-- Tag Script สำหรับเขียน JavaScript -->
    <script></script>
  </body>
</html>

หลังจากที่เราได้หน้าหลักกันแล้ว เราก็จะมาเขียน JavaScript เพื่อให้ทำงาน Countdown

<script>
      //กำหนดเป็นวันที่ 1 มกราคม 2025 เวลา 00:00 
      const countDownDate = new Date("Jan 1, 2025 00:00:00").getTime(); 
      //กำหนดให้ทำงานฟังก์ชันทุกๆ 1 วินาที โดยใช้ setInterval
      const x = setInterval(() => {}, 1000); >
</script>

หลักจากนั้นเราก็จะเขียนฟังก์ชันการทำงานใน setInterval

 <script>
      let countDownDate = new Date("2025-01-01 00:00:00").getTime();
      const x = setInterval(() => {
        // รับค่าเวลา ณ ปัจจุบัน
        let now = new Date().getTime();
        // หาเวลาที่ห่างจากเวลาที่กำหนด
        let distance = countDownDate - now;
        // กำหนดมิลิวินาทีใน 1 วัน
        const millisecondsPerDay = 86400000; // 1000 * 60 * 60 * 24
        // กำหนด 24 ชั่วโมง ใน 1 วัน
        const hoursPerDay = 24;
        // กำหนด 60 นาที ใน 1 ชั่วโมง
        const minutesPerHour = 60;
        // กำหนด 60 วินาที ใน 1 นาที
        const secondsPerMinute = 60;

        // คำนวณเวลา
        let daysRemaining = Math.floor(distance / millisecondsPerDay);
        let hoursRemaining = Math.floor(
          (distance % millisecondsPerDay) / (millisecondsPerDay / hoursPerDay)
        );
        let minutesRemaining = Math.floor(
          (distance % (millisecondsPerDay / hoursPerDay)) /
            (millisecondsPerDay / hoursPerDay / minutesPerHour)
        );
        let secondsRemaining = Math.floor(
          (distance % (millisecondsPerDay / hoursPerDay / minutesPerHour)) /
            (millisecondsPerDay /hoursPerDay / minutesPerHour / secondsPerMinute)
        );

        // เปลี่ยนค่าใน HTML 
        document.getElementById("days").innerHTML = daysRemaining;
        document.getElementById("hours").innerHTML = hoursRemaining;
        document.getElementById("min").innerHTML = minutesRemaining;
        document.getElementById("sec").innerHTML = secondsRemaining;
      }, 1000);
</script>


เพิ่มการตรวจสอบเมื่อครบกำหนดแล้วให้หยุดการทำงาน

if (distance < 1) {
          clearInterval(x);
          document.getElementById("countdown").innerHTML = "";
          document.getElementById("hny").innerHTML = "Happy New Year 🎉";
        }

ดังนี้ครับ
