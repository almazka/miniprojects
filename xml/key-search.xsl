<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:key
name="keyTeacher"
match="/root/course"
use="teachers/teacher" />
<xsl:key name="keyKW"
match="/root/course"
use="keywords/keyword" />
	
<xsl:template match="/">
	<html>
		<body>
			<h1>Выбор курса по преподу - Никитин И.Г.</h1>
				<ul>
				<xsl:for-each select="key('keyTeacher', 'Никитин И.Г.')">
				<li><xsl:value-of select="title" /></li>
				</xsl:for-each>
				</ul>
			<h1>Выбор курса по ключевому слову - XML</h1>
				<ul>
				<xsl:for-each select="key('keyKW', 'XML')">
				<li><xsl:value-of select="title" /></li>
				</xsl:for-each>
				</ul>
			<h1>Выбор курса препода Шуков И.Г. с кючевым словом - XSLT</h1>
				<ul>
				<xsl:for-each select="key('keyKW', 'XSLT')[teachers/teacher = 'Шуков И.Г.']">
				<li><xsl:value-of select="title" /></li>
				</xsl:for-each>
				</ul>
		</body>
	</html>
</xsl:template>
</xsl:stylesheet>