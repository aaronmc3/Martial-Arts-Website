CREATE VIEW ProductListView AS
SELECT ProductID, ProductName, SalePrice, ImageURL, MartialArt, ClothingCategory
FROM product
WHERE Stock > 0;