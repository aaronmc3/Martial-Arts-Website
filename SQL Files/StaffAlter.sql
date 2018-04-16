ALTER TABLE staff
ADD HouseNo char(255),
ADD Street char(255),
ADD City char(255),
ADD Postcode char(10),
ADD Country char(255),
ADD vPassword char(255);

ALTER TABLE Staff
DROP COLUMN Address;