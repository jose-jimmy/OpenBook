<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no" />
    <title>Open Book</title>
    <meta name="description" content="Find books from Google Play Books" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/site.webmanifest">
    <meta itemprop="name" content="Books" />
    <meta itemprop="description" content="Find books from Google Play Books" />
    <meta itemprop="image" content="icons/icon-192x192.png" />
    <meta name="theme-color" content="#ffffff" />
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,900&display=swap" rel="stylesheet" />


    <!-- CSS -->
    <link rel="stylesheet" href="./css/index.css" />

</head>

<body>
    <aside>
        <div class="logo">
            <a href="./home.php">
                OpenBook
            </a>
        </div>
        <nav>
            <ul>
                <li class="subhead">DISCOVER</li>
                <li>
                    <a class="nav scrolltoview current" href="#search"><span class="icon">🔍</span>Search</a>
                </li>
                <li>
                    <a class="nav scrolltoview" href="#foryou"><span class="icon">💖</span>For you</a>
                </li>
                <li>
                    <a class="nav" href="buynow.php"><span class="icon">📚</span>Library</a>
                </li>
                <li class="subhead">COLLECTION</li>
                <li>
                    <a class="nav scrolltoview" href="#fiction"><span class="icon">👽</span>Fiction</a>
                </li>
                <li>
                    <a class="nav scrolltoview" href="#poetry"><span class="icon">🌈</span>Poetry</a>
                </li>
                <li>
                    <a class="nav scrolltoview" href="#fantasy"><span class="icon">🌺</span>Fantasy</a>
                </li>
                <li>
                    <a class="nav scrolltoview" href="#romance"><span class="icon">💕</span>Romance</a>
                </li>
                <li class="nav trigger"><span class="icon">✨</span>More</li>

            </ul>
        </nav>
    </aside>


    <main id="main" class="main">
        <article>
            <section id="search" class="results">
                <div class="flex">
                    <input id="search-box" class="search-box" placeholder="Search books by name, author, genre and etc ..." aria-label="Search books" />
                    <div class="spacer"></div>

                    <!--Theme toggle-->
                    <label class="theme-switch" for="checkbox" title="Night mode">
                        <input type="checkbox" id="checkbox" aria-label="Night mode" />
                        <div class="slider round"></div>
                    </label>

                    <div class="action">
                        <div class="profile" onclick="menuToggle();">
                            <img src="./css/icons/13.png">
                        </div>
                        <div class="menu">
                            <h3><?php echo $_SESSION['user_name']; ?></h3>
                            <div class="ul">
                                <div class="li">
                                    <a href="logout.php"><img src="./css/icons/logout.png">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-book search">
                    <div class="prompt">Enter a search term</div>
                </div>

            </section>
            <div id="foryou">
                <section class="results">
                    <div class="list-book foryou">
                        <a class="category" href="#love">
                            <div class="book">
                                <div class="book-info">
                                    <h1 class="section-title">Daily Top 100</h1>
                                </div>
                            </div>
                        </a>
                        <a class="category" href="#feminism">
                            <div class="book">
                                <div class="book-info">
                                    <h1 class="section-title">New releases</h1>
                                </div>
                            </div>
                        </a>
                        <a class="category" href="#inspirational">
                            <div class="book">
                                <div class="book-info">
                                    <h1 class="section-title">Bestsellers</h1>
                                </div>
                            </div>
                        </a>
                        <a class="category" href="#authors">
                            <div class="book">
                                <div class="book-info">
                                    <h1 class="section-title">Top authors</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </section>
                <section id="love" class="results">
                    <div class="flex">
                        <h1 class="section-title">Daily Top 100</h1>
                        <div>
                            <button id="love-prev" class="pagination prev" onclick="prev('love')">
                                ◀
                            </button>
                            <button id="love-next" class="pagination next" onclick="next('love')">
                                ▶
                            </button>
                        </div>
                    </div>
                    <div class="list-book love categories">
                        <div class="prompt">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="fade left"></div>
                    <div class="fade right"></div>
                </section>
                <section id="feminism" class="results">
                    <div class="flex">
                        <h1 class="section-title">New releases</h1>
                        <div>
                            <button id="feminism-prev" class="pagination prev" onclick="prev('feminism')">
                                ◀
                            </button>
                            <button id="feminism-next" class="pagination next" onclick="next('feminism')">
                                ▶
                            </button>
                        </div>
                    </div>
                    <div class="list-book feminism categories">
                        <div class="prompt">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="fade left"></div>
                    <div class="fade right"></div>
                </section>
                <section id="inspirational" class="results">
                    <div class="flex">
                        <h1 class="section-title">Bestsellers</h1>
                        <div>
                            <button id="inspirational-prev" class="pagination prev" onclick="prev('inspirational')">
                                ◀
                            </button>
                            <button id="inspirational-next" class="pagination next" onclick="next('inspirational')">
                                ▶
                            </button>
                        </div>
                    </div>
                    <div class="list-book inspirational categories">
                        <div class="prompt">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="fade left"></div>
                    <div class="fade right"></div>
                </section>
                <section id="authors" class="results">
                    <div class="flex">
                        <h1 class="section-title">Top authors</h1>
                        <div>
                            <button id="authors-prev" class="pagination prev" onclick="prev('authors')">
                                ◀
                            </button>
                            <button id="authors-next" class="pagination next" onclick="next('authors')">
                                ▶
                            </button>
                        </div>
                    </div>
                    <div class="list-book authors categories">
                        <div class="prompt">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="fade left"></div>
                    <div class="fade right"></div>
                </section>
            </div>
            <section id="fiction" class="results">
                <div class="flex">
                    <h1 class="section-title">Fiction</h1>
                    <div>
                        <button id="fiction-prev" class="pagination prev" onclick="prev('fiction')">
                            ◀
                        </button>
                        <button id="fiction-next" class="pagination next" onclick="next('fiction')">
                            ▶
                        </button>
                    </div>
                </div>
                <div class="list-book fiction">
                    <div class="prompt">
                        <div class="loader"></div>
                    </div>
                </div>
            </section>
            <section id="poetry" class="results">
                <div class="flex">
                    <h1 class="section-title">Poetry</h1>
                    <div>
                        <button id="poetry-prev" class="pagination prev" onclick="prev('poetry')">
                            ◀
                        </button>
                        <button id="poetry-next" class="pagination next" onclick="next('poetry')">
                            ▶
                        </button>
                    </div>
                </div>
                <div class="list-book poetry">
                    <div class="prompt">
                        <div class="loader"></div>
                    </div>
                </div>
            </section>
            <section id="fantasy" class="results">
                <div class="flex">
                    <h1 class="section-title">Fantasy</h1>
                    <div>
                        <button id="fantasy-prev" class="pagination prev" onclick="prev('fantasy')">
                            ◀
                        </button>
                        <button id="fantasy-next" class="pagination next" onclick="next('fantasy')">
                            ▶
                        </button>
                    </div>
                </div>
                <div class="list-book fantasy">
                    <div class="prompt">
                        <div class="loader"></div>
                    </div>
                </div>
            </section>
            <section id="romance" class="results">
                <div class="flex">
                    <h1 class="section-title">Romance</h1>
                    <div>
                        <button id="romance-prev" class="pagination prev" onclick="prev('romance')">
                            ◀
                        </button>
                        <button id="romance-next" class="pagination next" onclick="next('romance')">
                            ▶
                        </button>
                    </div>
                </div>
                <div class="list-book romance">
                    <div class="prompt">
                        <div class="loader"></div>
                    </div>
                </div>
            </section>
            <footer id="footer" class="footer">
                <div class="prompt">
                    <a class="pagination" href="https://github.com/jose-jimmy" target="_blank" rel="noopener" aria-label="GitHub"><img src="./css/icons/github.svg" alt="GitHub" /></a>
                </div>
            </footer>
        </article>
        <div class="modal">
            <span class="close-button">✖</span>
            <div class="modal-content">
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Adult
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Anthologies
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Art
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Audiobooks
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Biographies
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Body
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Business
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Children
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Comics
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Contemporary
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Cooking
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Crime
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Engineering
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Entertainment
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Fantasy
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Fiction
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Food
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    General
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Health
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    History
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Horror
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Investing
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Literary
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Literature
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Manga
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Media-help
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Memoirs
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Mind
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Mystery
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Nonfiction
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Religion
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Religion
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Romance
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Science
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Self
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Spirituality
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Sports
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Superheroes
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Technology
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Thrillers
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Travel
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Women
                </h3>
                <h3 class="book-authors" onclick='updateFilter(this,"subject");toggleModal();'>
                    Young
                </h3>
            </div>
        </div>
    </main>


    <!--Javascript-->
    <script src="./js/index.js"></script>
</body>

</html>