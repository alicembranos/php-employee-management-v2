-- Insert data into user's table
INSERT INTO users (name, password, email, type) VALUES (
    'admin', 
    '$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC', 'admin@assemblerschool.com', 
    'admin'
);
INSERT INTO employees (name, lastName, email, gender, age, city, streetAddress,  state, postalCode, phoneNumber) VALUES 
(
    "John",
    "Doe",
    "jhon@foo.com",
    "man",
    34,
    "Chicago",
    "207 South Washington",
    "WA",
    19889,
    "1283645645"
),
(
    "Leila",
    "Mills",
    "mills@leila.com",
    "woman",
    55,
    "Deer Park",
    "20530 North Rand Road",
    "IL",
    198765,
    "9983632461"
),
(
    "Richard",
    "Desmond",
    "dismond@foo.com",
    "man",
    30,
    "Peoria",
    "4712 N. University St",
    "UT",
    457320,
    "90876987654"
),
(
    "Susan",
    "Smith",
    "susanmith@baz.com",
    "woman",
    28,
    "Chicago",
    "180 North Michigan Avenue",
    "WA",
    445321,
    "224355488976"
),
(
    "Brad",
    "Simpson",
    "brad@foo.com",
    "man",
    40,
    "Atlanta",
    "1022 S. Canal",
    "GEO",
    394221,
    "6854634522"
),
(
    "Neil",
    "Walker",
    "walkerneil@baz.com",
    "man",
    42,
    "Nashville",
    "3304 Touhy Ave",
    "TN",
    90143,
    "45372788192"
),
(
    "Robert",
    "Thomson",
    "jackon@network.com",
    "man",
    24,
    "New Orleans",
    "1209 West Dundee Rd",
    "LU",
    63281,
    "91232876454"
),
(
    "Emma",
    "Pattson",
    "emma@network.com",
    "woman",
    32,
    "River Forest",
    "7215 Lake St",
    "IL",
    60517,
    "91253876654"
);

INSERT INTO sessions (date_from, date_to, goal)
VALUES('2022-6-27', '2022-7-05', 400);


INSERT INTO sport_data (session_id, employee_id, distance, steps, calories, weight) VALUES 
(
    1,
    1,
    15,
    15000,
    1550,
    1.5
),
(
    1,
    2,
    22,
    20000,
    1300,
    1
),
(
    1,
    3,
    10,
    8000,
    1100,
    0.5
),
(
    1,
    4,
    13,
    11000,
    1600,
    0.75
),
(
    1,
    5,
    30,
    16700,
    1600,
    2
),
(
    1,
    6,
    14,
    7560,
    867,
    0
),
(
    1,
    7,
    16,
    14300,
    1450,
    1
),
(
    1,
    8,
    15,
    13564,
    1453,
    1.75
);