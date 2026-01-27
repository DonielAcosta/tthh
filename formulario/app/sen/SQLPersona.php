<?php
/**
 * @file SQLPersona.php
 *
 * Consultas SQL de la Tabla Persona
 *
 * @author SOLINF
 * @version V 0.1
 * @date 24/02/2020
 *
 */
class SQLPersona {
    const AGREGAR_PERSONA = "
INSERT INTO public.personagob(
	nacpersona, cedpersona, nompersona, apepersona, genpersona, fecnacpersona, edocivpersona, correopersona, numhijmenpersona, numhijmay, 
    tel2dompersona, telmov1persona, telmov2persona, discpersona, descdiscpersona, facepersona, instpersona, twtpersona, wapppersona, munhabpersona, 
    parhabpersona, dirpersona, nacconpersona, cedconpersona, nomconpersona, apeconpersona, genconpersona, fecnacconpersona, tiplabpersona, munlabpersona, 
    parlabpersona, dirlabpersona, otrodestlabpersona, dirotrodestlabpersona, tyc, numhijdispersona,fecingpersona,entepersona,tipdiscpersona, gdodiscpersona, numcarnetdiscpersona, telhabpersona, 
    correoconpersona, telmovconpersona, admantpersona1, cgoantpersona1, fecingantpersona1, fecfinantpersona1, admantpersona2, cgoantpersona2, fecingantpersona2, fecfinantpersona2, 
    admantpersona3, cgoantpersona3, fecingantpersona3, fecfinantpersona3)
	VALUES (
?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
?, ?, ?, ?,?,?)
";
    const ACTUALIZAR_PERSONA = "UPDATE Persona SET idEdoCivil = ?, idEdoRegistro = ?, cedPersona = ?, rifPersona = ?, genPersona = ?, nomPersona = ?, apePersona = ?, correoPersona = ?, fecNacPersona = ?, pesoPersona = ?, altPersona = ?, telPersona = ?, mov1Persona = ?, mov2Persona = ?, numCasaPersona = ?, dirPersona = ?, obsPersona = ?, fecIngPersona = ? WHERE idPersona = ?";
    const ELIMINAR_PERSONA = "DELETE FROM Persona WHERE id = ?";
    
    
    const CONSULTAR_MUNICIPIOS = "SELECT * FROM tbl_municipios ORDER BY nombre_municipio";
    
    const CONSULTAR_PARROQUIAS_POR_ID_MUNICIPIOS = "SELECT * FROM tbl_parroquias WHERE id_municipio = ? ORDER BY nombre_parroquia";
    
    // 	const CONSULTAR_PERSONA = "SELECT
    // 	per.idEdoRegistro AS idEdoRegistroPer,
    // 	usu.idEdoRegistro AS idEdoRegistroUsu,
    // 	per.*,
    // 	usu.*,
    //     edo1.*,
    //     Rol.* FROM Persona per
    // 	INNER JOIN Usuario usu USING(idPersona)
    // 	INNER JOIN EdoRegistro edo1 USING(usu.idEdoRegistro)
    // 	INNER JOIN Rol USING(idRol)ORDER BY per.idPersona";
    const CONSULTAR_PERSONA = "SELECT
	per.idEdoRegistro AS idEdoRegistroPer,
	usu.idEdoRegistro AS idEdoRegistroUsu,
	per.*,
	usu.*,
    edo1.*,
    Rol.* FROM  EdoRegistro edo1, Persona per
	INNER JOIN Usuario usu USING(idPersona)
	INNER JOIN Rol USING(idRol)
    WHERE edo1.idEdoRegistro = usu.idEdoRegistro
    ORDER BY per.idPersona";
}
?>