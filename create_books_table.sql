CREATE TABLE `books` (
  `book_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `author` VARCHAR(255) NOT NULL,
  `genre` VARCHAR(100) NOT NULL,
  `publish_year` INT NOT NULL,
  `description` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `books` (title, author, genre, publish_year, description) VALUES
('The Silent River', 'M. Khan', 'Mystery', 2018, 'A detective searches for clues along the river.'),
('Dreams of Tomorrow', 'S. Rahman', 'Sci-Fi', 2021, 'A futuristic journey through AI consciousness.'),
('Autumn Leaves', 'J. Patel', 'Romance', 2016, 'A heart-warming story of love and loss.'),
('Shadow Lines', 'A. Das', 'Thriller', 2019, 'An undercover agent uncovers hidden truths.'),
('Beyond the Stars', 'R. Limo', 'Adventure', 2022, 'An explorer discovers a new world beyond space.');
