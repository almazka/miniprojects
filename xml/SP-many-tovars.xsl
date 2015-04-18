<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output 
method="html" 
doctype-public="-//W3C//DTD HTML 4.01//EN" 
doctype-system="http://www.w3.org/TR/html4/strict.dtd" 
indent="yes"/>
<xsl:key name="keySP"
	match="/allsp/sp/name"
	use="." />

<xsl:template match="/">
	<html>
		<head><title>СП</title></head>
		<body>
			<h1>Выборка уникальных СП</h1>
			<ul>
				<xsl:variable name="onlySP" select="/allsp/sp/name[generate-id(.) = generate-id(key('keySP', .))]" />
				<xsl:for-each select="$onlySP">
					<li>
						<xsl:variable name="currSP" select="."/>
						<xsl:text>В СП </xsl:text>
						<xsl:value-of select="." />
						<xsl:text> я брала:</xsl:text>
						<ul>
						<xsl:for-each select="key('keySP', $currSP)/../goods">
						<li>
						<xsl:value-of select="." />
						</li>
						
						</xsl:for-each>
						</ul>
					</li>
				</xsl:for-each>
			</ul>
		</body>
	</html>
</xsl:template>

</xsl:stylesheet>