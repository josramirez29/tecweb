<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="XSLT-compat" indent="yes"/>

    <xsl:template match="/">
        <html lang="es">
        <head>
            <meta charset="UTF-8"/>
            <title>Catálogo VOD</title>
            <style>
                body { font-family: Arial; }
                table { width: 90%; margin-bottom: 20px; }
                th, td { border: 2px solid #ddd; padding: 8px; text-align: left; }
            </style>
        </head>
        <body>
            <h1>Catálogo</h1>

            <h2>Perfiles</h2>
            <ul>
                <xsl:for-each select="CatalogoVOD/cuenta/perfiles/perfil">
                    <li>
                        Usuario: <xsl:value-of select="@usuario"/> 
                        (Idioma: <xsl:value-of select="@idioma"/>)
                    </li>
                </xsl:for-each>
            </ul>

            <h2>Películas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Duración</th>
                        <th>Género</th>
                        <th>Región</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:for-each select="CatalogoVOD/contenido/peliculas">
                        <xsl:for-each select="genero">
                            <xsl:for-each select="titulo">
                                <tr>
                                    <td><xsl:value-of select="."/></td>
                                    <td><xsl:value-of select="@duracion"/></td>
                                    <td><xsl:value-of select="../@nombre"/></td>
                                    <td><xsl:value-of select="../../@region"/></td>
                                </tr>
                            </xsl:for-each>
                        </xsl:for-each>
                    </xsl:for-each>
                </tbody>
            </table>

            <h2>Series</h2>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Duración</th>
                        <th>Género</th>
                        <th>Región</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:for-each select="CatalogoVOD/contenido/series">
                        <xsl:for-each select="genero">
                            <xsl:for-each select="titulo">
                                <tr>
                                    <td><xsl:value-of select="."/></td>
                                    <td><xsl:value-of select="@duracion"/></td>
                                    <td><xsl:value-of select="../@nombre"/></td>
                                    <td><xsl:value-of select="../../@region"/></td>
                                </tr>
                            </xsl:for-each>
                        </xsl:for-each>
                    </xsl:for-each>
                </tbody>
            </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
