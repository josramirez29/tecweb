<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="XSLT-compat" indent="yes"/>

    <xsl:template match="/CatalogoVOD">
        <html lang="es">
        <head>
            <meta charset="UTF-8"/>
            <title>Catálogo VOD</title>
            <style>
                            body {
                margin: 0;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f3e8ff;
                color: #333;
                line-height: 1.6;
            }

            h1 {
                color: #fff;
                font-size: 3.5em;
                margin: 0;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(to right, #a738f7, #b776d1);
                padding: 20px 0;
                text-align: center;
            }

            h1 img {
                width: 350px;
                height: auto;
                margin-right: 15px;
            }

            .perfiles {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 20px 0;
            }

            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                background-color: #fff;
            }

            th, td {
                padding: 12px;
                text-align: center;
                border-bottom: 1px solid #ddd;
                font-size: 1.2em;
            }

            th {
                background-color: #8e44ad;
                color: white;
                font-size: 1.5em;
            }

            h2 {
                font-size: 2em;
                color: #8e44ad;
                padding: 10px;
                font-weight: bold;
                background-color: #e9d6f3;
                text-align: center;
            }

            ul {
            font-size: 1.3em;
            }

            tr:hover {
                background-color: #f1e6ff;
            }
            </style>
        </head>
        <body>
                 <h1>
                    CATÁLOGO
                    <img src="img/hbo.svg" alt="Logo"></img>
                 </h1>
            
            <h2>Perfiles</h2>
            <div class="perfiles">
                <ul>
                    <xsl:for-each select="cuenta/perfiles/perfil">
                        <li>
                            Nombre: <xsl:value-of select="@usuario"/> 
                            (Idioma: <xsl:value-of select="@idioma"/>)
                        </li>
                    </xsl:for-each>
                </ul>
            </div>

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
                    <xsl:for-each select="contenido/peliculas/genero/titulo">
                        <tr>
                            <td><xsl:value-of select="."/></td>
                            <td><xsl:value-of select="@duracion"/></td>
                            <td><xsl:value-of select="../@nombre"/></td>
                            <td><xsl:value-of select="../../@region"/></td>
                        </tr>
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
                    <xsl:for-each select="contenido/series/genero/titulo">
                        <tr>
                            <td><xsl:value-of select="."/></td>
                            <td><xsl:value-of select="@duracion"/></td>
                            <td><xsl:value-of select="../@nombre"/></td>
                            <td><xsl:value-of select="../../@region"/></td>
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
