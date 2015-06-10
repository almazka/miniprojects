<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output 
method="html" 
doctype-public="-//W3C//DTD HTML 4.01//EN" 
doctype-system="http://www.w3.org/TR/html4/strict.dtd" 
indent="yes"/>

<xsl:variable name="books" select="/pricelist/book[contains(title, 'XML')]" />
		
	<!-- Шаблон корневого элемента -->
	<xsl:template match="/">
		<html>
			<head>
				<title>Книги про XML</title>
			</head>
			<body>
			<h1>Результаты поиска</h1>
				<xsl:text>По запросу 'XML' найдено </xsl:text>
					<xsl:value-of select="count($books)" />
				<xsl:text> книг</xsl:text>
				<br />
				<xsl:text>Средняя цена: </xsl:text>
				<xsl:value-of select="round(sum($books/price) div count($books))" /><xsl:text> руб.</xsl:text>
				<hr />
				<!--apply-templates-->
				<xsl:apply-templates select="$books" />
			</body>
		</html>
	</xsl:template>
	
	<!-- Вывод одной книги -->
	<xsl:template match="book">
		<div>
			<h3>
				<xsl:value-of select="title" />
			</h3>
			<strong>
				<xsl:value-of select="author" />
			</strong>
			<em>
				<xsl:text> </xsl:text><xsl:value-of select="price" /><xsl:text> руб.</xsl:text>
			</em>
			<br />
	<xsl:choose>
	<xsl:when test="@store">
		<xsl:text>На складе </xsl:text><xsl:value-of select="@store" /><xsl:text> шт.</xsl:text>
	</xsl:when>
	<xsl:otherwise>
		Нет на складе
	</xsl:otherwise>
	</xsl:choose>
		</div>
	</xsl:template>
	
	
</xsl:stylesheet>