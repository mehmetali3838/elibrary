![Diagram](https://github.com/mehmetali3838/elibrary/assets/147253627/1372894b-33f9-49b3-b199-16db4ff03bb7)


*******************************************************

1- Kütüphaneden alınan toplam kitap sayısı kaçtır? ***
SELECT COUNT(*) as total_books FROM books;
*******************************************************
2 - Kütüphanede hiç kitap kiralamamış öğrencilerin listesi --->>>
SELECT u.* FROM users u
LEFT JOIN user_books ub ON u.id = ub.user_id
WHERE ub.user_id IS NULL;
*******************************************************
3- En çok kitap kiralayan öğrenci kimdir? --->>>
SELECT u.*, COUNT(ub.book_id) as rented_books_count
FROM users u
INNER JOIN user_books ub ON u.id = ub.user_id
GROUP BY u.id
ORDER BY rented_books_count DESC
LIMIT 1;
*******************************************************
4- Yazarların kitap sayısını listesi? --->>>
SELECT a.*, COUNT(b.id) as book_count
FROM authors a
LEFT JOIN books b ON a.id = b.author_id
GROUP BY a.id;
*******************************************************
5- Bütün öğrencilerin yaş ortalamasından büyük olan öğrencilerin listesi (Örneğin yaş ortalaması 15, Yaşı 15 ten büyük öğrencilerin listesi) --->>>
(Yaş ortalamasını bulmak için kullanılacak sorgu) --->>>
SELECT AVG(age) as avg_age FROM users;
(Yaş ortalamasından büyük olan öğrencileri listelemek için kullanılan sorgu) --->>>
SELECT * FROM users WHERE age > (SELECT AVG(age) FROM users);
*******************************************************
