<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output 
method="xml" 
encoding="UTF-8"
indent="yes"/>

<xsl:template match="/">
	<items>
		<xsl:apply-templates />
	</items>
</xsl:template>
<xsl:template match="li">
	<xsl:param name="pid" select="0" />
	<item id="{@id}" pid="{$pid}" autor="{h3/span}">
		<xsl:value-of select="p" />
	</item>
	<xsl:apply-templates select="ul/li">
		<xsl:with-param name="pid" select="@id" />
	</xsl:apply-templates>
</xsl:template>
	
</xsl:stylesheet>