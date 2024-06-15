<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        html {
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

:root {
  --small-green-circle: #78eea6;
  --main-accent-color: #9b45e4;
  --secondary-accent-color: #e13a9d;
}

a {
  background-color: transparent;
}

img {
  border-style: none;
}

button {
  font-family: inherit;
  font-size: 100%;
  line-height: 1.15;
  margin: 0;
  overflow: visible;
  -webkit-appearance: button;
}

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner {
  border-style: none;
  padding: 0;
}

body {
  margin: 0;
  background: #e6b2c6;
  background: -webkit-linear-gradient(to right, #e6b2c6, #d6e5fa);
  background: linear-gradient(to right, #e6b2c6, #d6e5fa);
  font-family: "Lato", sans-serif;
  font-weight: normal;
  background-repeat: no-repeat;
}

.container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, auto));
  justify-content: center;
  align-items: center;
  height: 100vh;
  text-align: center;
}

.card {
  padding: 1em;
  border-radius: 0.8em;
  background-color: #fefefe;
  box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.02),
    0 6.7px 5.3px rgba(0, 0, 0, 0.028), 0 12.5px 10px rgba(0, 0, 0, 0.035),
    0 22.3px 17.9px rgba(0, 0, 0, 0.042), 0 41.8px 33.4px rgba(0, 0, 0, 0.05),
    0 100px 80px rgba(0, 0, 0, 0.07);
  position: relative;
}

/* .card:after {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background-color: var(--small-green-circle);
  top: 25px;
  right: 96px;
  border: 2px solid white;
} */

.card__image {
  width: 100px;
  border-radius: 50%;
}

.card__info {
  margin: 1em 0;
  list-style-type: none;
  padding: 0;
}

.card__info li {
  display: inline-block;
  text-align: center;
  padding: 0.5em;
}

.card__info__stats {
  color: var(--main-accent-color);
  font-weight: bold;
  font-size: 1.2em;
  display: block;
}

.card__info__stats + span {
  color: #969798;
  text-transform: uppercase;
  font-size: 0.8em;
  font-weight: bold;
}

.card__text h2 {
  margin-bottom: 0.3em;
  font-size: 1.4em;
  color: #6f6f6f;
}

.card__text h4 {
  margin-bottom: 0.3em;
  color: #6f6f6f;
  margin-bottom: 35px;
}

.card__text p {
  margin-bottom: 20px;
  color: #999;
  font-size: 0.95em;
}

.card__action {
  display: flex;
  justify-content: space-around;
}

.card__action__button {
  padding: 0.9em 1.3em;
  text-transform: uppercase;
  color: #fff;
  border: none;
  border-radius: 0.5em;
  cursor: pointer;
  position: relative;
}

.card__action__button:before {
  content: "";
  position: absolute;
  border-radius: 0.5em;
  transition: all 0.35s ease-in-out;
}

.card__action__button:hover:before {
  top: -6px;
  bottom: -6px;
  left: -6px;
  right: -6px;
}

.card__action--follow {
  background-color: #FF7622;
}

.card__action__button:hover:before {
  border: 4px solid var(--main-accent-color);
}

.card__action--message {
  background-color: var(--secondary-accent-color);
}

.card__action--message:hover:before {
  border: 4px solid var(--secondary-accent-color);
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


@media (min-width: 425px) {
  .card {
    padding: 3em;
  }

  .card:after {
    top: 50px;
    right: 160px;
  }

  .card__info li {
    padding: 1em;
  }
  .card__action__button {
    padding: 0.9em 1.8em;
  }
}
    </style>
</head>
<body>
<main class="container">
  <div class="card">
    <img src="./img/profile.jpeg" alt="User image" class="card__image" />
    <div class="card__text">
      <h2>Alexandra Caulea</h2>
      <p>I enjoy reading a books!</p>
      <h4>My Favorite Books</h4>
    </div>

    <div class="book-list">
        <div class="book">
            <img src="./img/TentangKamu.jpeg" alt="Tentang Kamu">
            <p class="book-title">Tentang Kamu</p>
            <p class="book-author">Tere Liye</p>
        </div>
        <div class="book">
            <img src="./img/pergi.jpg" alt="Tentang Kamu">
            <p class="book-title">Tentang Kamu</p>
            <p class="book-author">Tere Liye</p>
        </div>
        <div class="book">
            <img src="./img/komet.png" alt="Tentang Kamu">
            <p class="book-title">Tentang Kamu</p>
            <p class="book-author">Tere Liye</p>
        </div>
    </div>

    <ul class="card__info">
      <li>
        <span class="card__info__stats">3</span>
        <span>Favotire</span>
      </li>
      <li>
        <span class="card__info__stats">15</span>
        <span>Review</span>
      </li>
      <li>
        <span class="card__info__stats">20</span>
        <span>Love</span>
      </li>
    </ul>
  </div>
</main>
</body>
</html>