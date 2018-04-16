CREATE VIEW ProductDetailView AS
SELECT ProductID, ProductName, Description, SalePrice, Stock, ImageURL
FROM product
WHERE Stock > 0;