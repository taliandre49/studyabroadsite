-- Source: ALL info and images taken from :https://abroad.globallearning.cornell.edu/discover-programs
--Programs--
CREATE TABLE programs(
  id INTEGER NOT NULL UNIQUE,
  name TEXT NOT NULL,
  city TEXT NOT NULL,
  rating INTEGER NOT NULL,
  requirment TEXT NOT NULL,
  majors TEXT NOT NULL,
  descrip TEXT,
  file_name TEXT NOT NULL,
  file_ext TEXT NOT NULL,
  file_source TEXT,
  PRIMARY KEY(id AUTOINCREMENT)
);

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    1,
    'BU: Sydney Internship Program',
    'Sydney, Australia',
    4,
    'Must have a 3.00+ GPA',
    'Hotel Hospitality & Administration',
    "The program known as Sydney Internship Program integrates academic coursework at the Boston University (BU) Sydney Center with practical work experience. Upon finishing the six-week central study phase, students will devote the remaining eight weeks to full-time internships with organizations located in the wider Sydney region. During this period, they will work for four days every week while simultaneously taking an elective course.",
    'Sydney, Australia',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    2,
    'Exchange: French, Food and Wine',
    'Paris, France',
    4,
    'Must have a 3.20+ GPA, French Fluency',
    'Food Science',
    "This program allows students to dive in to the culture, history and art about the food, wine and culture of France. With an intensive 8 week course students learn the history and fundamental concepts behind traditional dishes and nutrients.",
    'Paris, France',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    3,
    'CASA Trinty College',
    'Dublin, Ireland',
    3,
    'Must have a 3.30+ GPA',
    'Civil Engeneering, Architecture',
    "Offered through the university of Dublin, Ireland allows students to immerse themselves into the unqiue architecture design and patterns of Ireland, Civil Engeneerings are offered a 5 week course in which they dive into structural and structure supporting concepts surrounding the late 1800s historical architecture.",
    'Dublin, Ireland',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    4,
    'SAI in Barcelona',
    'Barcelona, Spain',
    5,
    'Must have a 3.50+ GPA, Spanish Proficiency',
    'Spanish, Education',
    "SAI's study abroad program at the Universitat Autonoma de Barcelona offers students the opportunity to study courses in both Spanish and English while residing in one of the most vibrant cities in Spain. For those seeking a program that provides exceptional levels of support, SAI is an excellent option. ",
    'Barcelon, Spain',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    5,
    'CASA CUBA',
    'Havana, Cuba',
    3,
    'Must have a 3.00+ GPA, Spanish Proficiency(not required, but highly recommended)',
    'ILR',
    "CASA-Cuba, the University of Havana, and Casa de Las Américas have worked together to develop a program of study that will challenge you to achieve a critical understanding of the key issues facing Cuba today and enable you to interact with some of the countrys leading academic experts in the social sciences, arts and the humanities. You will immerse yourself in Cuba, taking courses in Spanish from recognized experts on key issues facing the country and interacting with peers who share your intellectual curiosity about Cubas past, present and future. Your courses at the CASA Center and the university will be complemented throughout the semester with special seminars and guest lectures by respected experts from other key research centers. In addition, you can propose to undertake focused research projects where you will engage with recognized Cuban experts who can connect you with local archives, museums, and key cultural organizations.",
    'Havanna, Cuba',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    6,
    'CET: Jordan',
    'Amman, Jordan',
    3,
    'Must have a 3.00+ GPA',
    'History, Politics,Language',
    "Hands-on learning in the Middle East: Study Modern Standard Arabic and Dialect and take classes, including internships, in English or Arabic. Whether your interest is in politics, religion, health, refugees, or history, there is something for you!",
    'Amman, Jordan',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    7,
    "SIT/IHP: People, Planning, and Politics",
    "Buenos Aires, Argentina",
    4,
    'Must have a 3.00+ GPA, Spanish Proficiency',
    'Pre-Law, Politics, History',
    'The cosmopolitan capital city of Buenos Aires has a history with an enduring legacy: European-influenced architecture; an extraction economy; large landowners; an influential Catholic church; charismatic political leadership and military dictatorships; a proud tradition of public protest; and a cultural heritage embedded in the tango. Underlying it all are the complex lives of a diverse society where former owners now work to survive, and former workers now manage retaken factories.',
    'Argentina',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    8,
    "Democracy in Botswana",
    "Botswana, Africa",
    3,
    'Must have a 3.20+ GPA',
    'Public Health',
    'While in the capital city of Botswana, you will learn about the countries exotic wildlife, Tswana culture, and historic past, all while completing courses across a variety of subjects, including public health, communication, wildlife ecology and conservation, African literature, business, economics, and more! ',
    'Botswana, Africa',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    9,
    "The People, Env., and Climate Change",
    "Antarctic Peninsula",
    2,
    'Must have a 2.50+ GPA, pass a health exam',
    'Environmental studies, Environmental Engineering',
    'Discover how vulnerable ecosystems are impacted by human activity and climate change in Southern Patagonia and Antarctica. Learn about the environmental characteristics of Southern Patagonia and Antarctica from your home base in Ushuaia, the southern-most city in the world.',
    'Antartica',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    10,
    "ITESM:Tecnológico de Monterrey",
    "Monterrey, Mexico",
    5,
    'Must be in "good academic standing", Spanish Profeciency, and must be at least a Sophmore',
    'All STEM majors',
    'Tecnológico de Monterrey (Tec de Monterrey) is one of Latin Americas largest and most prestigious universities with campuses throughout Mexico. The Mexico City campus offers a comprehensive curriculum with courses available not only in the STEM fields but also humanities, and social sciences. As a Tec de Monterrey International student you have the opportunity to become completely immersed in Mexican student life. Choose from a wide range of classes in English while you learn Spanish, live in student housing or with a host family or take advantage of the hundreds of different extra-curricular activities including sports teams, special interest groups and cultural activities. ',
    'mexico',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    11,
    "CASA Brazil",
    "Rio de Janeiro, Brazil",
    4,
    'Must be in "good academic standing", some knoweldge of Portuguese (need not be proficient)',
    'Cultural Studies/Art History, Economics, Geography, History/Political Science/International Studies, Literature, and Psychology',
    "This CASA Brazil program builds upon one of Brown University’s longest running study abroad programs, developed over thirty years ago in close collaboration with Brown’s Department of Portuguese and Brazilian Studies.  In its new and expanded iteration, CASA-Brazil harnesses the academic strengths and research ties to Brazil of the full Consortium membership to provide exceptional study abroad experiences to serious students. CASA’s key institutional partner is the Pontifícia Universidade Católica (PUC-Rio), Brazil’s premier private university, consistently ranked among the top universities in the country.",
    'Brazil',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

INSERT INTO
  programs (
    id,
    name,
    city,
    rating,
    requirment,
    majors,
    descrip,
    file_name,
    file_ext,
    file_source
  )
VALUES
  (
    12,
    "KCJS: Consortium for Japanese Studies",
    "Kyoto, Japan",
    4,
    'Must have a 3.0+ GPA, Must have completed at least one year of college-level Japanese',
    'Cultural Studies/Art History, Asian Religions and Society',
    "The Kyoto Consortium for Japanese Studies (KCJS) is a semester or academic year long program for undergraduates who wish to do work in Japanese language and Japanese studies. The program will help you strengthen your Japanese skills by providing intensive language training and regular interactions with host families and the local community. Understanding of Japanese society and culture is enhanced by the integration of the historical and cultural resources of Kyoto into the academic curriculum and student life. Coursework and program activities will enable you to explore the significance of Kyoto's past, its present and Japan's place in today's global world.",
    'Japan',
    'jpeg',
    'https://abroad.globallearning.cornell.edu/discover-programs'
  );

-- tags table
CREATE TABLE tags(
  id INTEGER NOT NULL UNIQUE,
  identifier TEXT NOT NULL,
  PRIMARY KEY(id AUTOINCREMENT)
);

INSERT INTO
  tags(id, identifier)
VALUES
  (1, " Fall ");

INSERT INTO
  tags(id, identifier)
VALUES
  (2, " Spring ");

INSERT INTO
  tags(id, identifier)
VALUES
  (3, " Europe ");

INSERT INTO
  tags(id, identifier)
VALUES
  (4, " Asia ");

INSERT INTO
  tags(id, identifier)
VALUES
  (5, " Africa ");

INSERT INTO
  tags(id, identifier)
VALUES
  (6, " South America ");

INSERT INTO
  tags(id, identifier)
VALUES
  (7, " North America ");

INSERT INTO
  tags(id, identifier)
VALUES
  (8, " Australia ");

INSERT INTO
  tags(id, identifier)
VALUES
  (9, " Antartica ");

INSERT INTO
  tags(id, identifier)
VALUES
  (10, " Summer ");

INSERT INTO
  tags(id, identifier)
VALUES
  (11, " Winter ");

-- third table
CREATE TABLE joint(
  id INTEGER NOT NULL UNIQUE,
  tags_id INTEGER NOT NULL,
  programs_id INTEGER NOT NULL,
  PRIMARY KEY(id AUTOINCREMENT),
  FOREIGN KEY (tags_id) REFERENCES tags(id),
  FOREIGN KEY (programs_id) REFERENCES programs(id)
);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (1, 2, 3);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (2, 3, 3);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (3, 1, 2);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (4, 3, 2);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (5, 10, 1);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (6, 8, 1);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (7, 3, 4);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (8, 10, 4);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (9, 7, 5);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (10, 1, 5);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (11, 2, 5);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (12, 4, 6);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (13, 2, 6);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (14, 6, 7);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (15, 11, 7);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (16, 5, 8);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (17, 1, 8);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (18, 9, 9);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (19, 11, 9);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (20, 7, 10);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (21, 10, 10);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (22, 6, 11);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (23, 2, 11);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (24, 1, 12);

INSERT INTO
  joint(id, tags_id, programs_id)
VALUES
  (25, 4, 12);

-- users: ---
CREATE TABLE users(
  id INTEGER NOT NULL UNIQUE,
  name TEXT NOT NULL,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  PRIMARY KEY(id AUTOINCREMENT)
);

--user1
INSERT INTO
  users (id, name, username, password)
VALUES
  (
    1,
    'Sofia Andrea',
    'Sofia',
    '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.' -- monkey
  );

--- Sessions ---
CREATE TABLE sessions (
  id INTEGER NOT NULL UNIQUE,
  user_id INTEGER NOT NULL,
  session TEXT NOT NULL UNIQUE,
  last_login TEXT NOT NULL,
  PRIMARY KEY(id AUTOINCREMENT) FOREIGN KEY(user_id) REFERENCES users(id)
);

--- Groups ----
CREATE TABLE groups (
  id INTEGER NOT NULL UNIQUE,
  name TEXT NOT NULL UNIQUE,
  PRIMARY KEY(id AUTOINCREMENT)
);

INSERT INTO
  groups (id, name)
VALUES
  (1, 'admin');

--- Group Membership ---
CREATE TABLE user_groups (
  id INTEGER NOT NULL UNIQUE,
  user_id INTEGER NOT NULL,
  group_id INTEGER NOT NULL,
  PRIMARY KEY(id AUTOINCREMENT) FOREIGN KEY(group_id) REFERENCES groups(id),
  FOREIGN KEY(user_id) REFERENCES users(id)
);

-- User 'Sofia' is a member of the 'admin' group.
INSERT INTO
  user_groups (user_id, group_id)
VALUES
  (1, 1);
