INSERT INTO SONG (title, bandArtist) VALUES
    ('Bohemian Rhapsody', 'Queen'),
    ('Jingle Bells', 'Les Paul'),
    ('In Da Club', '50 Cent'),
    ('Single Ladies', 'Beyonce'),
    ('Alejandro', 'Lady Gaga'),
    ('Empire State of Mind', 'Jay-Z'),
    ('Dark Horse', 'Katy Perry'),
    ('Sweet Child O Mine', 'Guns N Roses'),
    ('I Want It That Way', 'Backstreet Boys'),
    ('Billie Jean', 'Michael Jackson'),
    ('Forget about Dre', 'Dr.Dre'),
    ('New Day', 'Alicia Keys');

INSERT INTO CONTRIBUTOR (contributorName) VALUES
    ('Freddie Mercury'),
    ('James Lord Pierpont'),
    ('Dr. Dre'),
    ('Beyonce Knowles'),
    ('Steven Klein'),
    ('Alicia Keys'),
    ('Dr.Luke'),
    ('Mike Clink'),
    ('Max Martin'),
    ('Quincy Jones');

INSERT INTO USER (phoneNum, name) VALUES
(6306667743, 'Aleena Ahmad'),
(6302054221, 'Edgar Villafuerte'),
(6305428202, 'Sahithi Challapalli'),
(6309406296, 'Payton Suchomel'),
(6309479478, 'Omer Ahmad');

INSERT INTO FILES (songID, version) VALUES
(1, 'Original'),
(1, 'The Muppets'),
(1, 'Kanye West'),
(1, 'Marc Martel'),
(2, 'Original'),
(2, 'The Beatles'),
(2, 'The Chipmunks'),
(2, 'Barry Manilow'),
(2, 'Frank Sintara'),
(3, 'Original'),
(4, 'Original'),
(5, 'Original'),
(6, 'Original'),
(7, 'Original'),
(8, 'Original'),
(9, 'Original'),
(10, 'Original');

INSERT INTO SELECTS (timeDate, phoneNum, amount, fileID) VALUES
('2019-12-04 14:23:55', 6305428202, 0, 1),
('2019-12-04 16:36:21', 6302054221, 2.00, 16),
('2019-12-04 16:27:18', 6309479478, .50, 4),
('2019-12-04 16:28:09', 6309406296, 1.00, 10);

INSERT INTO TYPECONTRIBUTOR (contribution, songID, contributorID) VALUES 
('Songwriter', 1, 1),
('Songwriter', 2, 2),
('Songwriter', 3, 3),
('Producer', 4, 4),
('Video Director', 5,5),
('Songwriter', 6,6),
('Producer',12,3);
