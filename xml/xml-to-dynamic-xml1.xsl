<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<!-- 	* самоподсчитывающийся item
		* самоподсчитывающийся комментарий 
		* сортировать по алфавиту по имени автора
		* каждую нечетную строку сделать цветом
-->
	<xsl:template match="/">
		<html>
			<head>
				<title>Супер книги тысячелетия</title>
			</head>
			<body>
			<h1>Книги в каталоге:</h1>
			<xsl:comment>Всего <xsl:value-of select="count(/pricelist/book)" /> элемента(ов)</xsl:comment>
				<ul>
					<xsl:apply-templates select="/pricelist/book">
					<xsl:sort select="author" />
					</xsl:apply-templates>
				</ul>
			</body>
		</html>
	</xsl:template>
	<xsl:template match="book">
		<li>
		<xsl:if test="position() mod 2 != 0">
			<xsl:attribute name="style">background-color:#fcc;</xsl:attribute>
		</xsl:if>
		<xsl:attribute name="id">
			<xsl:value-of select="position()" />
		</xsl:attribute>
		<xsl:for-each select=".">
			<xsl:value-of select="author" />
			<xsl:text>: </xsl:text>
			<xsl:value-of select="title" />
		</xsl:for-each>
			
		</li>
	</xsl:template>	
</xsl:stylesheet>
