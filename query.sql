CREATE table categories (
    id int NOT NULL AUTO_INCREMENT,
    name VARCHAR(225),
    PRIMARY KEY(id)
);

CREATE table cars (
    id int NOT NULL,
    category_id int references category(id),
    make VARCHAR(225),
    color VARCHAR(225),
    transmission VARCHAR(225),
    doors int,
    type VARCHAR(225) NOT NULL,
    engine_size float,
    fuel_type VARCHAR(225),
    mileage int,
    torque int,
    top_speed int,
    maximum_power int,
    maximum_torque int,
    description text,
    image_path VARCHAR(225) NOT NULL,
    image_path1 VARCHAR(225) NOT NULL,
    image_path2 VARCHAR(225) NOT NULL,
    image_path3 VARCHAR(225),
    PRIMARY KEY(id),
);
