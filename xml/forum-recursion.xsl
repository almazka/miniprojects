<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output 
method="html" 
doctype-public="-//W3C//DTD HTML 4.01//EN" 
doctype-system="http://www.w3.org/TR/html4/strict.dtd" 
indent="yes"/>
	
	<xsl:template match="items">
		<ul>
			<xsl:apply-templates select="item[@pid=0]" />
		</ul>
	</xsl:template>
	<xsl:template match="item">
		<xsl:variable name="id" select="@id" />
		<li id="{@id}">
			<h3><span><xsl:value-of select="@author" /></span> пишет: </h3>
			<p><xsl:value-of select="." /></p>
			<xsl:if test="../item[@pid=$id]">
				<ul>
				<xsl:apply-templates select="../item[@pid=$id]" />
				</ul>
			</xsl:if>
			
		</li>
	</xsl:template>
</xsl:stylesheet>