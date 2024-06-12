<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f5f5f5;
}

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header-left h1 {
  margin: 0;
  color: #ff5722;
  font-size: 18px;
}
.search-bar {
  flex-grow: 1;
  margin: 0 20px;
  display: flex;
  justify-content: center;
}

.search-bar input {
  padding: 10px;
  font-size: 16px;
  width: 150%;
  max-width: 400px;
  border: 1px solid #ccc;
  border-radius: 20px;
  background-color: #f5f5f5;
}

.search-bar input[type="text"]:focus {
  outline: none;
  border: 1px solid #999;
}

.search-bar i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 10px;
  cursor: pointer;
  font-size: 18px;
  color: #999;
}
.header-right {
  display: flex;
  align-items: center;
  position: relative;
}

.header-right p {
  margin: 0;
  margin-right: 15px;
  font-size: 16px;
}

.notification-icon {
  position: relative;
  width: 24px;
  height: 24px;
  background-color: #ff5722;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  font-size: 14px;
  cursor: pointer;
}

.notification-bubble {
  position: absolute;
  top: -8px;
  right: -17px;
  font-size: 14px;
  font-weight: bold;
  color: rgb(0, 0, 0);
  border-radius: 50%;
  padding: 2px 5px;
  font-size: 12px;
  display: inline-block; 
  margin-left: 5px; 
  line-height: 1; 
  transition: background-color 0.3s ease; 
}

.notification-bubble.hidden {
  display: none;
}

.header-right {
  position: relative;
}

.notification-container {
  position: flex; 
  top: 0;
  right: 0;
}

#greeting {
  display: inline-block;
}

#greeting::after {
  content: "";
  display: inline-block;
  margin-left: 10px;
}

.time-update {
  font-size: 14px;
  color: #666;
}

.categories-section {
  margin: 20px 0;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.categories-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.categories-header h2 {
  margin: 0;
  font-size: 20px;
  color: #333;
  font-weight: bold;
}

.categories-header a {
  font-size: 14px;
  color: #666;
  text-decoration: none;
  cursor: pointer;
}

.categories {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  font-size: 13px;
}

.category {
  width: 130px; 
  height: 30px;
  background-color: #f5f5f5;
  border-radius: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.category:hover {
  background-color: #e9e9e9;
}

.category.active {
  background-color: #ff5622d4;
  color: #fff;
}

.category span {
  font-size: 13px;
  font-weight: bold;
  color: #333;
}

main {
  padding: 20px;
}

section {
  margin-bottom: 40px;
}

section h2 {
  margin-bottom: 20px;
  color: #333;
}

.recommended {
  margin: 20px 0;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.recommended h2 {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 20px;
  text-align: left; /* Center the heading */
}

.popular {
  margin: 20px 0;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.popular h2 {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 20px;
  text-align: left; /* Center the heading */
}

.book-list {
  display: flex;
  gap: 20px;
  overflow-x: auto;
}

.book {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 10px;
  text-align: center;
  width: 120px;
  cursor: pointer;
}

.book img {
  width: 100%;
  height: auto;
  border-radius: 5px;
}

.book-title {
  font-size: 16px;
  font-weight: bold;
  margin: 10px 0 5px;
}

.book-author {
  font-size: 14px;
  color: #666;
  margin: 0;
}

.hot-books {
  display: flex;
  flex-wrap: wrap; /* Allow sections to wrap on smaller screens */
  padding: 20px;
}

.container {
  margin: 30px 50px;
  background-color: rgb(240, 217, 217);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
  font-size: 36px;
  }
  
  p {
  font-size: 16px;
  }
  
  .books {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end; /* Align books to the right */
  flex: 2; /* Allow books container to take up more space */
  }
  
  .book {
  width: 200px;
  margin: 20px;
  text-align: center;
  }
  
  .butterfly {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 60px;
  }
  
  .left-wing,
  .right-wing,
  .body,
  .antennae .left-antenna,
  .antennae .right-antenna {
  position: absolute;
  }
  
  /* New styles for text container */
  .text-container {
    flex: 1; /* Allow text container to take up remaining space */
    padding: 30px;
  }

footer {
  background-color: #333;
  color: #fff;
  padding: 20px 0;
}

.footer-container {
  display: flex;
  justify-content: space-around;
  padding-bottom: 20px;
}

.footer-column {
  text-align: left;
}

.footer-column h3 {
  margin-top: 0;
  font-size: 14px;
  margin: 5px 0;
}

.footer-column ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-column ul li {
  margin: 5px 0;
  font-size: 14px;
}
.footer-column ul li a {
  color: #fff;
  text-decoration: none;
}


.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-top: 1px solid #444;
  padding-top: 10px;
}

.footer-bottom p {
  margin: 10px 0;
  font-size: 14px;
}

.social-icons {
  display: flex;
  gap: 10px;
}

.social-icons a {
  color: #fff;
  margin: 10px;
  text-decoration: none;
}

.social-icon {
  color: #fff;
  text-decoration: none;
  font-size: 14px;
}

.social-icon:hover {
  color: #ffcc00;
}

@media (max-width: 768px) {
  .footer-container {
      flex-direction: column;
      align-items: center;
  }

  .footer-bottom {
      flex-direction: column;
  }
}
    </style>
</head>

<body>
    <header>
        <div class="header-left">
            <h1>REKOMENDASI BUKU</h1>
        </div>
        <div class="search-bar">
            <form action="/search" method="get"> <input type="text" name="q" placeholder="Search for title, author, or genre" id="search-box">
            </form>
        </div>
        <div class="header-right">
            <p id="greeting"></p>
            <div class="notification-container" onclick="goToNotifications()">
        <div class="notification-icon" onclick="showNotifications()">🔔</div>
            <span class="notification-bubble" id="notification-count"></span>
        </div>
        <div id="notifications-container" class="hidden">
        </div>
    </header> 
    <main>
        <section class="categories-section">
            <div class="categories-header">
              <h2>All Categories</h2>
            </div>
            <div class="categories">
              <div class="category" data-category="all">All</div>
              <div class="category" data-category="fiksi">Fiksi</div>
              <div class="category" data-category="non-fiksi">Non Fiksi</div>
              <div class="category" data-category="self-improvement">Self Improvement</div>
              <div class="category" data-category="historical">Historical</div>
              <div class="category" data-category="humor">Humor</div>
              <div class="category" data-category="horor">Horor</div>
            </div>
          </section>
        <section class="recommended">
            <h2>Recommended For You</h2>
            <div class="book-list">
                <div class="book">
                    <img src="Tentang Kamu.jpeg" alt="Tentang Kamu">
                    <p class="book-title">Tentang Kamu</p>
                    <p class="book-author">Tere Liye</p>
                </div>
                <div class="book">
                    <img src="Mariposa.jpeg" alt="Mariposa">
                    <p class="book-title">Mariposa</p>
                    <p class="book-author">Luluk HF</p>
                </div>
                <div class="book">
                    <img src="Pulang.jpeg" alt="Pulang">
                    <p class="book-title">Pulang</p>
                    <p class="book-author">Tere Liye</p>
                </div>
                <div class="book">
                    <img src="Bulan.jpeg" alt="Bulan">
                    <p class="book-title">Bulan</p>
                    <p class="book-author">Tere Liye</p>
                </div>
                <div class="book">
                    <img src="Pergi.jpeg" alt="Pergi">
                    <p class="book-title">Pergi</p>
                    <p class="book-author">Tere Liye</p>
                </div>
                <div class="book">
                    <img src="Komet.jpeg" alt="Komet">
                    <p class="book-title">Komet</p>
                    <p class="book-author">Tere Liye</p>
                </div>
            </div>
        </section>
        
        <section class="popular">
            <h2>Popular</h2>
            <div class="book-list">
                <div class="book">
                    <img src="Laskar Pelangi.jpeg" alt="Laskar Pelangi">
                    <p class="book-title">Laskar Pelangi</p>
                    <p class="book-author">Andrea Hirata</p>
                </div>
                <div class="book">
                    <img src="Fokus.jpeg" alt="Fokus">
                    <p class="book-title">Fokus</p>
                    <p class="book-author">Daniel Goleman</p>
                </div>
                <div class="book">
                    <img src="The Power Of Habits.jpeg" alt="The Power Of Habits">
                    <p class="book-title">The Power Of Habits</p>
                    <p class="book-author">Charles Duhigg</p>
                </div>
                <div class="book">
                    <img src="Kambing Jantan.jpeg" alt="Kambing Jantan">
                    <p class="book-title">Kambing Jantan : Sebuah Catatan Harian Pelajar Bodoh</p>
                    <p class="book-author">Raditya Dika</p>
                </div>
                <div class="book">
                    <img src="Sapiens.jpeg" alt="Sapiens">
                    <p class="book-title">Sapiens : A Brief History of Humankind</p>
                    <p class="book-author">Yuval Noah Harari</p>
                </div>
                <div class="book">
                    <img src="The Deep.jpeg" alt="The Deep">
                    <p class="book-title">The Deep</p>
                    <p class="book-author">Nick Cutter</p>
                </div>
            </div>
        </section>        
        <div class="container">
            <div class="header">
              <h1>Hot Books!</h1>
              <p>Buku-buku terbaru dan terpopuler</p>
            </div>
          
            <div class="books">
              <div class="book">
                <div class="butterfly">
                  <div class="left-wing"></div>
                  <div class="body"></div>
                  <div class="right-wing"></div>
                  <div class="antennae">
                    <div class="left-antenna"></div>
                    <div class="right-antenna"></div>
                  </div>
                </div>
                <h2>Mariposa</h2>
                <p>Luluk HE</p>
              </div>
          
              <div class="book">
                <div class="butterfly">
                  <div class="left-wing"></div>
                  <div class="body"></div>
                  <div class="right-wing"></div>
                  <div class="antennae">
                    <div class="left-antenna"></div>
                    <div class="right-antenna"></div>
                  </div>
                </div>
                <h2>Mariposa</h2>
                <p>Luuk HE</p>
              </div>
          
              <div class="book">
                <div class="butterfly">
                  <div class="left-wing"></div>
                  <div class="body"></div>
                  <div class="right-wing"></div>
                  <div class="antennae">
                    <div class="left-antenna"></div>
                    <div class="right-antenna"></div>
                  </div>
                </div>
                <h2>Mariposa</h2>
                <p>Lulok HF</p>
              </div>
          
              <div class="book">
                <div class="butterfly">
                  <div class="left-wing"></div>
                  <div class="body"></div>
                  <div class="right-wing"></div>
                  <div class="antennae">
                    <div class="left-antenna"></div>
                    <div class="right-antenna"></div>
                  </div>
                </div>
                <h2>Mariposa</h2>
                <p>Luluk HE</p>
              </div>
          
              <div class="book">
                <div class="butterfly">
                  <div class="left-wing"></div>
                  <div class="body"></div>
                  <div class="right-wing"></div>
                  <div class="antennae">
                    <div class="left-antenna"></div>
                    <div class="right-antenna"></div>
                  </div>
                </div>
                <h2>Mariposa</h2>
                <p>Luuk HE</p>
              </div>
          
              <div class="book">
                <div class="butterfly">
                  <div class="left-wing"></div>
                  <div class="body"></div>
                  <div class="right-wing"></div>
                  <div class="antennae">
                    <div class="left-antenna"></div>
                    <div class="right-antenna"></div>
                  </div>
                </div>
                <h2>Mariposa</h2>
                <p>Lulok HF</p>
              </div>
            </div>
          </div>
          
    </main>
    
    <footer>
        <div class="footer-container">
          <div class="footer-column">
            <h3>RekomendasiBuku</h3>
          </div>
          <div class="footer-column">
            <ul>
              <li><a href="https://www.example.com/fiksi">Fiksi</a></li>
              <li><a href="https://www.example.com/non-fiksi">Non - Fiksi</a></li>
              <li><a href="https://www.example.com/self-improvement">Self Improvement</a></li>
              <li><a href="https://www.example.com/historical">Historical</a></li>
              <li><a href="https://www.example.com/humor">Humor</a></li>
              <li><a href="https://www.example.com/horor">Horor</a></li>
            </ul>
          </div>
          <div class="footer-column">
            <ul>
              <li><a href="https://www.example.com/adobe-illustrator">Adobe Illustrator</a></li>
              <li><a href="https://www.example.com/adobe-photoshop">Adobe Photoshop</a></li>
              <li><a href="https://www.example.com/design-logo">Design Logo</a></li>
            </ul>
          </div>
          <div class="footer-column">
            <ul>
              <li><a href="https://www.example.com/writing-course">Writing Course</a></li>
              <li><a href="https://www.example.com/photography">Photography</a></li>
              <li><a href="https://www.example.com/video-making">Video Making</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; RekomendasiBuku 2024. All Rights Reserved</p>
          <div class="social-icons">
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
      </footer>
    <script>
        const greetingElement = document.getElementById('greeting');
    
        function updateTime() {
          const date = new Date();
          let hours = date.getHours();
    
          let greetingText;
          if (hours >= 12 && hours < 18) {
            greetingText = 'Good Afternoon';
          } else if (hours >= 5 && hours < 12) {
            greetingText = 'Good Morning';
          } else {
            greetingText = 'Good Night';
          }
    
          greetingElement.textContent = `Hey, ${greetingText}`;
        }
    
        updateTime();
        setInterval(updateTime, 60000);
      </script>
      <script>
        function goToNotifications() {
        // Redirect the user to the notifications page URL (replace with your actual URL)
        window.location.href = "/notifications";
        }
      </script>
      <script>
        function updateNotificationCount(count) {
        const notificationBubble = document.getElementById('notification-count');
        notificationBubble.textContent = count;

        if (count === 0) {
        notificationBubble.classList.add('hidden');
        } else {
        notificationBubble.classList.remove('hidden');
        }

        const notificationIcon = document.querySelector('.notification-icon');
        const notificationBubbleWidth = notificationBubble.offsetWidth;
        notificationBubble.style.left = `${notificationIcon.offsetWidth + 10}px`; // Add spacing between icon and bubble
        }
      </script>
      <script>
      document.addEventListener('click', (event) => {
        const element = event.target;
        if (element.classList.contains('category')) {
          const category = element.dataset.category;
          window.location.href = `/category/${category}`; // Replace with your category URL structure
        }
      });
    </script>
    
</body>
</html>