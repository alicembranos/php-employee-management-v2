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
