<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output 
method="html" 
doctype-public="-//W3C//DTD HTML 4.01//EN" 
doctype-system="http://www.w3.org/TR/html4/strict.dtd" 
indent="yes"/>
<xsl:key name="keyCity"
	match="/items/item"
	use="@city" />
<xsl:key name="keyCityOrg"
	match="/items/item"
	use="concat(@city, ':', @org)" />
<xsl:template match="/">
	<html>
		<head><title>Магазины</title></head>
		<body>
			<ul>
				<xsl:variable name="unicCity" select="/items/item[generate-id(.) = generate-id(key('keyCity', @city))]" />
				<xsl:for-each select="$unicCity">
					<xsl:variable name="nameCity" select="@city" />
					<li>Магазины города <xsl:value-of select="@city" />:
						<xsl:variable name="orgs" select="items/item[generate-id(.) = generate-id(key('keyCityOrg', concat($nameCity, ':', @org)))]" />
						<xsl:for-each select="$orgs">
							<p><xsl:value-of select="@org" /></p>
							<ul>
								<xsl:for-each select="key('keyCityOrg', concat($nameCity, ':', @org))/@title">
								<li><xsl:value-of select="." /></li>
								</xsl:for-each>
							</ul>
						</xsl:for-each>
					</li>
				</xsl:for-each>
			</ul>
		</body>
	</html>
</xsl:template>

</xsl:stylesheet>