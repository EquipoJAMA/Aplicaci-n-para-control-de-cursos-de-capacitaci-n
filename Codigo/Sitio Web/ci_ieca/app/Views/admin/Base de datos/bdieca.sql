-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2020 a las 22:32:31
-- Versión del servidor: 5.6.17-log
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdieca`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addalu`(IN `cur` VARCHAR(19), IN `telal_idtel` INT(11), IN `nomalu` VARCHAR(50), IN `ap1` VARCHAR(30), IN `ap2` VARCHAR(30), IN `cor` VARCHAR(100), IN `cpa` INT(5))
BEGIN
	Declare curexiste int;
    Declare telexiste int;
    declare corexiste int;
    select trim(cur) into cur;
     set cur= trim(cur);
     select trim(nomalu) into nomalu;
     set nomalu= trim(nomalu);
     select trim(ap1) into ap1;
     set ap1= trim(ap1);
     select trim(ap2) into ap2;
     set ap2= trim(ap2);
       select trim(cor) into cor;
     set cor= trim(cor);
     
    
    if length(cur) = 0 then
			select concat("Por favor ingresa el CURP", cur) as mensaje;
		else if length(cur) < 18 then
			select concat("El CURP se conforma 18 caracteres ") as mensaje;
		else if length(cur) > 18 then
			select concat("El CURP no debe tener más de 18 caracteres ") as mensaje;
            else if length(nomalu) = 0 then
			select concat("Falta el Nombre del Alumno", nomalu) as mensaje;
		else if length(ap1) = 0 then
			select concat("Falta el Primer Apellido", ap1) as mensaje;
		else if length(ap2) = 0 then
			select concat("Falta el Segundo Apellido", ap2) as mensaje;
		else if length(cor) = 0 then
			select concat("Falta el correo", cor) as mensaje;
		else if cpa = 0 then
			select concat("Falta codigo postal", cpa) as mensaje;
		else
        SELECT COUNT(*) INTO curexiste FROM alumnos WHERE 	curp = cur;
        IF curexiste >0 THEN
        select concat("El curp  ", cur, "  ya existe") as mensaje;
        else
		
        SELECT COUNT(*) INTO corexiste FROM alumnos WHERE 	correoAl = cor;
        IF corexiste >0 THEN
        select concat("El Correo  ", cor, "  ya existe") as mensaje;
		else
        INSERT INTO alumnos VALUES (cur, telal_idtel, nomalu, ap1, ap2, cor,cpa);
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addaula`(IN idau INT(11), IN nomau VARCHAR(50), IN est VARCHAR(11))
BEGIN
	 declare nomexiste int;
     select trim(nomau) into nomau;
     set nomau= trim(nomau);
     
     
    
     if length(nomau) = 0 then
			select concat("Falta el nombre del aula", nomau) as mensaje;
        else
        SELECT COUNT(*) INTO nomexiste FROM aulas WHERE nombreAula = nomau;
        IF nomexiste >0 THEN
        select concat(" ", nomau, "  ya es un nombre de aula que existe") as mensaje;
        else
               
        INSERT INTO aulas VALUES (idau, nomau, default);
        
        end if;
        end if;
        
  
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addaut`(IN `id` INT(10), IN `sol` INT(10), IN `idpag` INT(11), IN `mont` DOUBLE(9,2))
begin
declare solexiste int;
declare pagexiste int;
declare des int;
declare mon double(9,2);
    
			if sol = 0 then
			select concat("Ingresa ID de la solicitud ") as mensaje;
		else if idpag = 0 then
			select concat("Ingresa ID del pago ") as mensaje;
            else
        SELECT COUNT(*) INTO solexiste FROM solbeca WHERE 	idSol = sol;
        IF solexiste < 1 THEN
        select concat("El id   ", sol, "   de solicitud que esta tratando de ingresar no se encuentra registrado") as mensaje;
		else
        SELECT COUNT(*) INTO pagexiste FROM pagos WHERE 	idPago = idpag;
        IF pagexiste < 1 THEN
        select concat("El id   ", idpag, "  de pago que esta tratando de ingresar no se encuentra registrado") as mensaje;
        else
        select mondes into des  from becas INNER JOIN solbeca on becas.idBeca= solbeca.becsol and solbeca.idSol= sol;
        select pago into mon from pagos where idPago= idpag;
		INSERT INTO autbec VALUES (id, sol, idpag,mon-des);
        
	end if;
    end if;
    end if;
    end if;

    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addbec`(IN `idbec` INT(10), IN `nombec` VARCHAR(25), IN `mon` INT(100))
BEGIN
	 declare idexiste int;
     declare nomexiste int;
     select trim(nombec) into nombec;
     set nombec= trim(nombec);
     
    
     if idbec = 0 then
			select concat("Falta id de beca", idbec) as mensaje;
        else if length(nombec) = 0 then
			select concat("Ingrese el nombre de la beca", nombec) as mensaje;
		else if mon = 0 then
			select concat("ingrese el monto de descuento") as mensaje;
		else
        SELECT COUNT(*) INTO idexiste FROM becas WHERE idBeca = idbec;
        IF idexiste > 0 THEN
        select concat("El id ", idbec, "  que estas tratando de ingresar ya existe") as mensaje;
        else 
        SELECT COUNT(*) INTO nomexiste FROM becas WHERE 	nomBeca = nombec;
        IF nomexiste >0 THEN
        select concat("La beca  ", nombec ,"  ya existe") as mensaje;
        else                
        INSERT INTO becas  VALUES (idbec, nombec, mon);
        
        end if;
        end if;
        end if;
        end if;
        end if;
	
        
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addcur`(IN idcur INT(10), IN idins INT (11), IN nomcur VARCHAR(100), IN imgcur VARCHAR(200), 
IN inicur DATE, IN tercur DATE, IN des VARCHAR(200), IN cos DOUBLE (9,2))
BEGIN
	declare existe int;
    declare verificar int;
    
    select trim(nomcur) into nomcur;
    set nomcur= trim(nomcur);
    select trim(imgcur) into imgcur;
    set imgcur= trim(imgcur);    
    select trim(des) into des;
    set des= trim(des);
    
    if idcur = 0   then
			select concat("Te hace falta ingresar el id") as mensaje;
		else if idins = 0 then
        select concat("Ingresa ingresa el id del instructor") as mensaje;
        else if length(nomcur) = 0 then
			select concat("Ingresa nombre del curso ") as mensaje;
        else if length(imgcur) = 0 then
			select concat("Ingresa ruta de imagen de curso ") as mensaje;
		else if inicur = 0 then
			select concat("Ingresa fecha de inicio del curso") as mensaje;
		else if tercur = 0 then
			select concat("Ingresa fecha de termino del curso") as mensaje;
		else if length(des) = 0 then
			select concat("Ingresa una descripcion del curso") as mensaje;
		else if cos = 0 then
			select concat("Ingresa el costo del curso") as mensaje;
		else
        SELECT COUNT(*) INTO existe FROM cursos WHERE idCursos = idcur;
        IF existe >0 THEN
        select concat("El id   ", idcur, "  que esta tratando de ingresar ya se encuentra registrado") as mensaje;
        else
		SELECT COUNT(*) INTO verificar FROM instructor WHERE idInstructor = idins;
        IF verificar < 1 THEN
        select concat("El id de instructor numero   ", idins, "  que esta tratando de ingresar no esta registrado") as mensaje;
		else
        INSERT INTO cursos VALUES (idcur, idins, nomcur, imgcur, inicur, tercur, des, cos);

	end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addesp`(IN idesp INT(11), IN esp VARCHAR(50), IN des varchar(150))
BEGIN
	 declare espexiste int;
     
     select trim(esp) into esp;
     set esp= trim(esp);
     select trim(des) into des;
     set des= trim(des);
     
    
     if length(esp) = 0 then
			select concat("Por favor ingresa tu especialidad", esp) as mensaje;
        else if length(des) = 0 then
			select concat("Ingresa una breve descripcion", des) as mensaje;
	   else 
        SELECT COUNT(*) INTO espexiste FROM especialidad WHERE 	especialidad = esp;
        IF espexiste >0 THEN
        select concat("La especialidad  ", esp ,"  ya existe") as mensaje;
        else                
        INSERT INTO especialidad  VALUES (idesp, esp, des);
     
     end if;
     end if;
     end if;
                
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addgpo`(IN idgpo INT(10), IN idcur INT(11),IN idaul INT(11), IN idhor INT(11), 
est varchar(11), IN cup INT(11))
BEGIN
	declare existe int;
    declare curexiste int;
    declare aulexiste int;
    declare horexiste int;
		if idgpo = 0   then
			select concat("Te hace falta ingresar el id") as mensaje;
		else if idcur = 0 then
			select concat("Ingresa ingresa el id del curso") as mensaje;
		else if idaul = 0 then
			select concat("Ingresa ingresa el id del alumno") as mensaje;
		else if idhor = 0 then
			select concat("Ingresa ingresa el id del horario") as mensaje;
		else if cup = 0 then
			select concat("Ingresa el cupo de participantes") as mensaje;
		else
        SELECT COUNT(*) INTO existe FROM grupo WHERE 	idGrupo = idgpo;
        IF existe >0 THEN
        select concat("El id   ", idgpo, "  que esta tratando de ingresar ya se encuentra registrado") as mensaje;
		else
        SELECT COUNT(*) INTO curexiste FROM cursos WHERE 	idCursos= idcur;
        IF curexiste < 1 THEN
        select concat("El id del curso   ", idcur, "  que esta tratando de ingresar no esta registrado") as mensaje;
		else
        SELECT COUNT(*) INTO aulexiste FROM aulas WHERE 	idAula= idaul;
        IF aulexiste < 1 THEN
        select concat("El id del aula   ", idaul, "  que esta tratando de ingresar no esta registrado") as mensaje;
        else
        SELECT COUNT(*) INTO horexiste FROM horario WHERE 	idHorario= idhor;
         IF horexiste < 1 THEN
        select concat("El id del horario   ", idhor, "  que esta tratando de ingresar no esta registrado") as mensaje;
		else
        INSERT INTO grupo VALUES (idgpo, idcur, idaul,idhor, default, cup);

	end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    
    

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addhor`(IN idhor int (10), IN inihor time, IN terhor time, IN diahor varchar(20))
BEGIN

declare existe int;
    select trim(idhor) into idhor;
    set idhor= trim(idhor);
    select trim(inihor) into inihor;
    set inihor= trim(inihor);
    select trim(terhor) into terhor;
    set terhor= trim(terhor);
    select trim(diahor) into diahor;
    set diahor= trim(diahor);
    
    if idhor = 0   then
			select concat("Necesitas un ID de horario") as mensaje;
		else if inihor = 0 then
			select concat("Ingresa el horario de inicio ") as mensaje;
        else if terhor = 0 then
			select concat("Ingresa el horario de termino ") as mensaje;
		else if length(diahor) = 0 then
			select concat("Ingresa el dia del curso") as mensaje;
            
		else
        SELECT COUNT(*) INTO existe FROM horario WHERE 	idHorario = idhor;
        IF existe >0 THEN
        select concat("El id   ", idhor, "  que esta tratando de ingresar ya se encuentra registrado") as mensaje;
        
		else
        INSERT INTO horario VALUES (idhor, inihor, terhor, diahor);

		end if;
        end if;
        end if;
        end if;
        end if;








END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addins`(IN `idins` INT(11), IN `idesp` INT(11), IN `idtip` INT(11), IN `idtel` INT(11), IN `nomins` VARCHAR(50), IN `ap1` VARCHAR(30), IN `ap2` VARCHAR(30))
BEGIN
	
    declare existe int;
    declare idespexiste int;
    declare idtipexiste int;
    declare idtelexiste int;
    
    select trim(idins) into idins;
    set idins= trim(idins);
    select trim(nomins) into nomins;
    set nomins= trim(nomins);
    select trim(ap1) into ap1;
    set ap1= trim(ap1);
    select trim(ap2) into ap2;
    set ap2= trim(ap2);
    
    
        if idins = 0 then
			select concat("Necesitas asignarle un ID al istructor") as mensaje;
		else if idesp = 0 then
			select concat("Ingresa el id especialidad ") as mensaje;
		else if idtip = 0 then
			select concat("Ingresa el id del tipo de Instructor ") as mensaje;
		else if length(nomins) = 0 then
			select concat("Ingresa nombre completo del Instructor ") as mensaje;
           
        else if length(ap1) = 0 then
			select concat("Ingresa el primer apellido ") as mensaje;
		else if length(ap2) = 0 then
			select concat("Ingresa el segundo apellido") as mensaje;
		else
        SELECT COUNT(*) INTO existe FROM instructor WHERE 	IdInstructor = idins;
        IF existe >0 THEN
        select concat("El id   ", idins, "  que esta tratando de ingresar ya se encuentra registrado") as mensaje;
        else
        SELECT COUNT(*) INTO idespexiste FROM especialidad WHERE 	idEspInst= idesp;
			IF idespexiste < 1 THEN
			select concat("Ese id de especialidad no existe") as mensaje;
		else
        SELECT COUNT(*) INTO idtipexiste FROM tipo WHERE 	idTipInst= idtip;
			IF idtipexiste < 1 THEN
			select concat("Ese id tipo de instructor no existe") as mensaje;
		else
        INSERT INTO instructor VALUES (idins, idesp, idtip, idtel, nomins, ap1, ap2);
        
        
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addinsc`(IN `id` INT(11), IN `gpo` INT(10), IN `alu` VARCHAR(18), IN `pag` INT(11))
BEGIN
	DECLARE gpoexiste int;
    DECLARE aluexiste int;
    DECLARE aluexiste2 int;
    DECLARE pagexiste int;
    
    
    select trim(alu) into alu;
    set alu= trim(alu);
    
        If gpo = 0   then
			select concat("Te hace falta ingresar el id del grupo") as mensaje;
		else if length(alu) = 0 then
			select concat("Ingresa el id del alumno") as mensaje;
		else if pag = 0 then
			select concat("Ingresa el id del pago") as mensaje;
		else
        SELECT COUNT(*) INTO gpoexiste FROM grupo WHERE 	idGrupo= gpo;
        IF gpoexiste < 1 THEN
        select concat("El id del grupo   ", gpo, "  que esta tratando de ingresar no esta registrado") as mensaje;
		else
        SELECT COUNT(*) INTO aluexiste FROM alumnos WHERE 	curp= alu;
         IF aluexiste < 1 THEN
        select concat("El id del alumno   ", alu, "  que esta tratando de ingresar no esta registrado") as mensaje;
        else
        select COUNT(*) Into aluexiste2  FROM inscritos WHERE grupo_idGrupo = gpo and alumnos_curp = alu ;
        IF aluexiste2 > 0 THEN
        select concat("Este alumno ya esta incrito en este curso") as mensaje;
        else
        SELECT COUNT(*) INTO pagexiste FROM pagos WHERE 	idPago= pag;
         IF pagexiste < 1 THEN
        select concat("El id del pago   ", pag, "  que esta tratando de ingresar no esta registrado") as mensaje;
         else
         IF (SELECT COUNT(*) FROM inscritos WHERE alumnos_curp = alu) > 0 THEN
         SELECT CONCAT("Esta persona ya se encuentra registrada en un curso") AS mensaje;
         ELSE
        INSERT INTO inscritos VALUES (id, gpo, alu, pag);
        update pagos  set estatusP='Pagado' where idPago= pag; 
         
        
        end if;
        end if;
        end if;
        end if;
		end if;
        end if;
        end if;
        end if;
        



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addpago`(IN `idpag` INT(10), IN `idcur` INT(10), IN `pag` DOUBLE(9,2), IN `fecp` DATE, IN `est` VARCHAR(15))
BEGIN
     declare curexiste int;
     declare existe int;
     declare mon double(9,2);
	
    
     if idcur = 0 then
			select concat("Falta id del curso", idcur) as mensaje;
        else if fecp = 0 then
			select concat("Ingrese la fecha de pago") as mensaje;
		else
        SELECT COUNT(*) INTO curexiste FROM cursos WHERE idCursos = idcur;
        IF curexiste < 1 THEN
        select concat("El id  ", idcur, " de curso no existe") as mensaje;
        else
        
       -- select costo into mon from cursos where idCursos= idcur;
 
		INSERT INTO pagos values (idpag, idcur, pag, fecp, default);
                
        
        end if;
        end if;
        end if;
        
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addsol`(solid int(10), alusol varchar(19), solbec int(10), solest varchar(30))
begin
declare existe int;
declare existe2 int;
declare existe3 int;
    select trim(alusol) into alusol;
    set alusol= trim(alusol);
    select trim(solest) into solest;
    set solest= trim(solest);
			if solid = 0 then
			select concat("Necesitas asignarle un ID ") as mensaje;
		else if length(alusol) = 0 then
			select concat("Ingresa curp del alumno ") as mensaje;
        else if solbec = 0 then
			select concat("Ingresa id de la solicitud ") as mensaje;
		else if length(solest) = 0 then
			select concat("Ingresa estatus ") as mensaje;
            else
        SELECT COUNT(*) INTO existe FROM solbeca WHERE 	idSol = solid;
        IF existe >0 THEN
        select concat("El id   ", solid, "  que esta tratando de ingresar ya se encuentra registrado") as mensaje;
        else
        SELECT COUNT(*) INTO existe2 FROM alumnos WHERE 	curp = alusol;
        IF existe2 < 1 THEN
        select concat("El id   ", alusol, "  que esta tratando de ingresar no se encuentra registrado") as mensaje;
		else
        SELECT COUNT(*) INTO existe3 FROM becas WHERE 	idBeca = solbec;
        IF existe3 < 1 THEN
        select concat("El id   ", solbec, "  que esta tratando de ingresar no se encuentra registrado") as mensaje;
         else
         INSERT INTO solbeca VALUES (solid, alusol, solbec, solest);
        
	end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    end if;
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addtel`(IN idtel INT(11), IN tptel INT(11), IN tel varchar(20))
BEGIN
	 declare tpexiste int;
     declare telexiste int;
     select trim(tel) into tel;
     set tel= trim(tel);
     
    
     if tptel = 0 then
			select concat("Falta id de tipo de telefono", tptel) as mensaje;
        else if length(tel) = 0 then
			select concat("Ingrese el numero telefonico", tel) as mensaje;
		else if length(tel) < 10 then
			select concat("El numero telefonico debe tener 10 digitos") as mensaje;
		else if length(tel) > 10 then
			select concat("numero telefonico debe tener 10 digitos ") as mensaje;
		else
        SELECT COUNT(*) INTO tpexiste FROM tipotel WHERE idTipTel = tptel;
        IF tpexiste < 1 THEN
        select concat("El id ", tptel, "  que estas tratando de ingresar no existe") as mensaje;
        else 
        SELECT COUNT(*) INTO telexiste FROM telefono WHERE 	telefono = tel;
        IF telexiste >0 THEN
        select concat("El telefono  ", tel ,"  ya existe") as mensaje;
        else                
        INSERT INTO telefono  VALUES (idtel,tptel, tel);
        
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addtip`(IN idtip INT(11), IN tip VARCHAR(12), IN des varchar(150))
BEGIN
	 declare tipexiste int;
     
     select trim(tip) into tip;
     set tip= trim(tip);
     select trim(des) into des;
     set des= trim(des);
     
    
     if length(tip) = 0 then
			select concat("Por favor ingresa el tipo de instructor ", tip) as mensaje;
        else if length(des) = 0 then
			select concat("Ingresa una breve descripcion", des) as mensaje;
	   else 
        SELECT COUNT(*) INTO tipexiste FROM tipo WHERE  tipo = tip;
        IF tipexiste >0 THEN
        select concat("El tipo de instructor  ", tip ," ya existe") as mensaje;
        else                
        INSERT INTO tipo  VALUES (idtip, tip, des);
     
     end if;
     end if;
     end if;
                
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addtipotel`(IN idtptel INT(11), IN tptel VARCHAR(50))
BEGIN
	 declare tpexiste int;
     
     select trim(tptel) into tptel;
     set tptel= trim(tptel);
     
    
     if length(tptel) = 0 then
			select concat("Falta el tipo de telefono", tptel) as mensaje;
        else
        SELECT COUNT(*) INTO tpexiste FROM tipotel WHERE 	tipoTelefono = tptel;
        IF tpexiste >0 THEN
        select concat("Ese tipo de telefóno  ", tptel, "  ya existe") as mensaje;
        else
               
        INSERT INTO tipotel VALUES (idtptel, tptel);
        
        end if;
        end if;
  
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busalu`(IN `buscur` VARCHAR(19))
BEGIN
	declare aluexiste int;
			select trim(buscur) into buscur;
     set buscur= trim(buscur);
     
            
            if length(buscur) = 0 then
			select concat("Por favor ingresa el curp del alumno") as mensaje;
           else if length(buscur) < 18 then
			select concat("El CURP se conforma 18 caracteres ") as mensaje;
		   else if length(buscur) > 18 then
			select concat("El CURP no debe tener más de 18 caracteres ") as mensaje;
           else            
            SELECT COUNT(*) INTO aluexiste FROM alumnos WHERE 	curp= buscur;
			IF aluexiste > 0 THEN
            select * from alumnos where curp= buscur;
            
            end if;
            end if;
            end if;
            end if;
            
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busaul`(IN `idau` INT(11))
BEGIN
	declare idexiste int;
			
            if idau = 0 then
			select concat("Por favor ingresa el id del aula") as mensaje;
            else            
            
            select * from aulas where idAula= idau;
            
            
            
            end if;
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busaut`(IN `autid` INT(10))
begin

declare idexiste int;
		if autid = 0 then
			select concat("Ingresa el id de la beca") as mensaje;
            else
            
            select * from autbec WHERE 	idaut= autid;
            
           
            end if;
            
        
        
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busbec`(IN `idbec` INT(10))
BEGIN
	declare aluexiste int;
			if idbec = 0 then
			select concat("Ingresa el id de la beca") as mensaje;
            else
            
            select * from becas where idBeca= idbec;
            
            
            end if;
            
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscur`(IN `idcur` INT(11))
BEGIN
	declare idexiste int;
			
            if idcur = 0 then
			select concat("Por favor ingresa el id de tipo del curso") as mensaje;
            else            
            
			
            select * from cursos where idCursos= idcur;
            
            

            end if;
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busesp`(IN `idesp` INT(11))
BEGIN
	declare idexiste int;
			
            if idesp = 0 then
			select concat("Por favor ingresa el id de la especialidad") as mensaje;
            else            
            
            select * from especialidad where idEspInst= idesp;
            
            
            
            end if;
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busgru`(IN `idgru` INT(11))
BEGIN
	declare aluexiste int;
			if idgru = 0 then
			select concat("Ingresa el id del grupo") as mensaje;
            else
            
            select * from grupo where idGrupo= idgru;
            
            
            end if;
            
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bushor`(IN `idhor` INT(10))
BEGIN
	declare aluexiste int;
			if idhor = 0 then
			select concat("Ingresa el id del horario") as mensaje;
            else
            SELECT COUNT(*) INTO aluexiste FROM horario WHERE 	idHorario= idhor;
			IF aluexiste = 1 THEN
			select * from horario where idHorario= idhor;
            
            
            end if;
            end if;
            
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busins`(IN `busins` INT(11))
BEGIN
	select idInstructor, especialidadIns_idEspInst, tipoIns_idTipInst, telefonoIns_idTel, telefono, nombreInstructor, apellidoI1, apellidoI2 from instructor JOIN telefono ON instructor.telefonoIns_idTel = telefono.idTel where idInstructor= busins;
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_businst`(IN `businst` INT(10))
BEGIN
	declare aluexiste int;
            SELECT COUNT(*) INTO aluexiste FROM inscritos WHERE  idInscrito = businst;
			IF aluexiste = 1 THEN
				select * from inscritos where idInscrito = businst;    
            
            end if;
            
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buspago`(IN `idpag` INT(10))
BEGIN
	declare pagexiste int;
			if idpag = 0 then
			select concat("Ingresa el id de la beca") as mensaje;
            else
            
            select * from pagos where idPago= idpag;
            
            
            end if;
            
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bussol`(IN `solid` INT(10))
begin
declare existe int;
    
    
   -- SELECT COUNT(*) INTO existe FROM solbeca WHERE 	idSol = solid;
        IF solid = 0 THEN
        select concat("Ingrese un id") as mensaje;
        else
        select * from solbeca where idSol= solid;
    
    
        end if;
        
        
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bustel`(IN `id` INT(11))
BEGIN
	declare idexiste int;
			
            if id = 0 then
			select concat("Por favor ingresa el id del telefono") as mensaje;
            else            
            SELECT COUNT(*) INTO idexiste FROM telefono WHERE 	idTel= id;
			IF idexiste < 1 THEN
			select concat("Ese id no existe") as mensaje;
			else
            select idTel, tipoTel_idTipTel, telefono from telefono where idTel= id;
            
            
            end if;
            end if;
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bustels`(IN id INT)
BEGIN
select idTel, tipoTel_idTipTel, telefono from telefono where idTel = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bustip`(IN `idtip` INT(11))
BEGIN

            select * from tipo where idTipInst= idtip;
            
            
            

            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bustptel`(IN idtptel int(11))
BEGIN
	declare idexiste int;
			
            if idtptel = 0 then
			select concat("Por favor ingresa el id del telefono") as mensaje;
            else            
            SELECT COUNT(*) INTO idexiste FROM tipotel WHERE 	idTipTel= idtptel;
			IF idexiste < 1 THEN
			select concat("Ese id no existe") as mensaje;
			else
            select * from tipotel where idTipTel= idtptel;
            
            
            end if;
            end if;
            
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delaut`(IN id INT(11))
begin

        delete from autbec where idaut = id;

    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delhorr`(iddel int (11))
begin
	DELETE from grupo where horario_idHorario= iddel;
    delete from horario where idHorario = iddel;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delins`(IN ins INT(11), IN id INT(11))
begin

        delete from inscritos where idInscrito =ins;

        update pagos set estatusP = default where idPago=id;
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delpag`(IN id INT(11))
begin

        delete from pagos where idPago= id;

        
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlal`()
begin
	select * from alumnos;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlaul`()
begin
	select * from aulas;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlbec`()
begin
	select * from becas;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlcur`()
begin
	select * from cursos;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlesp`()
begin
	select * from especialidad;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlgpo`()
begin
	SELECT * FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlhor`()
begin
	select * from horario;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlins`()
begin

        select idInscrito, nombre_curso, nombreAlumno, apellido1, apellido2, pago, estatusP from inscritos JOIN grupo ON inscritos.grupo_idGrupo = grupo.idGrupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos JOIN alumnos ON inscritos.alumnos_curp = alumnos.curp JOIN pagos ON inscritos.pagos_idPago = pagos.idPago;
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlinst`()
begin
	select idInstructor,nombreInstructor, apellidoI1, apellidoI2,especialidad, tipo from instructor JOIN especialidad ON instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON instructor.tipoIns_idTipInst = tipo.idTipInst;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enlpag`()
begin
	select idPago, nombre_curso, imgcurso, pago, fechaP, estatusP from pagos JOIN cursos ON pagos.id_cur = cursos.idCursos;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enltel`()
begin
	select * from telefono;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enltip`()
begin
	select * from tipo;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_enltptel`()
    NO SQL
begin
	SELECT * FROM tipotel;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lisaut`()
begin

        select idAut, nombreAlumno, apellido1, apellido2, monpag from autbec JOIN solbeca ON autbec.autsol = solbeca.idSol JOIN alumnos ON solbeca.solalu = alumnos.curp; 
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lisbec`()
begin

        select * from becas;
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lissol`()
begin

        select idSol, nombreAlumno, apellido1, apellido2, nomBeca, estsol from solbeca JOIN alumnos ON solbeca.solalu = alumnos.curp JOIN becas ON solbeca.becsol = becas.idBeca;
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updalu`(IN cp VARCHAR(19), IN tel INT(11), IN nmalu VARCHAR(50), IN ap1 VARCHAR(30), IN ap2 VARCHAR(30),
IN cor VARCHAR(100), IN cd INT(5))
BEGIN
	declare existe int;
    
    select trim(cp) into cp;
    set cp= trim(cp);
    
    SELECT COUNT(*) INTO existe FROM alumnos WHERE 	curp = cp;
        IF existe < 1 THEN
        select concat("este curp no existe") as mensaje;
        else
        update alumnos set
        curp=cp, telefonoAl_idTel= tel, nombreAlumno=nmalu, apellido1= ap1, apellido2= ap2, correoAl=cor,
        cpAl= cd where curp= cp;
    
    
        end if;
        
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updaul`(IN `id` INT(11), IN `nom` VARCHAR(50), IN `est` VARCHAR(13))
BEGIN
	declare existe int;
    select trim(nom) into nom;
    set nom= trim(nom);
    select trim(est) into est;
    set est= trim(est);
    
    if id = 0 then
			select concat("Ingresa el id") as mensaje;
        else if length(nom) = 0 then
			select concat("Ingresa elnombre del aula ") as mensaje;
		else
    SELECT COUNT(*) INTO existe FROM aulas WHERE 	idAula = id;
        IF existe < 1 THEN
        select concat("este ID no existe") as mensaje;
        else
        update aulas set
        nombreAula= nom, estatusAula= est where idAula= id;
		if length(est) = 0 then
        update aulas set estatusAula= default  where idAula= id;
    
		
        end if;
        end if;
        end if;
        end if;
	
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updaut`(autid int(10), solaut int(10),IN idpago INT(11), autmon double(9,2))
begin
declare existe int;
declare solexiste int;
declare pagexiste int;
declare des int;
declare mon double(9,2);
    
			if solaut = 0 then
			select concat("Ingresa ID de la solicitud ") as mensaje;
		else if idpag = 0 then
			select concat("Ingresa ID del pago ") as mensaje;
            else
        SELECT COUNT(*) INTO solexiste FROM solbeca WHERE 	idSol = solaut;
        IF solexiste < 1 THEN
        select concat("El id   ", sol, "   de solicitud que esta tratando de ingresar no se encuentra registrado") as mensaje;
		else
        SELECT COUNT(*) INTO pagexiste FROM pagos WHERE 	idPago = idpag;
        IF pagexiste < 1 THEN
        select concat("El id   ", idpag, "  de pago que esta tratando de ingresar no se encuentra registrado") as mensaje;    
    else
    SELECT COUNT(*) INTO existe FROM autbec WHERE 	idaut = autid;
        IF existe < 1 THEN
        select concat("este grupo no existe") as mensaje;
        else
        select mondes into des  from becas INNER JOIN solbeca on becas.idBeca= solbeca.becsol and solbeca.idSol= sol;
        select pago into mon from pagos where idPago= idpag;
        update autbec set
        idaut=autid, autsol= solaut, monpag= mon-des where idaut= autid;
    
    
        end if;
        end if;
        end if;
        end if;
        end if;
        
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updbeca`(idbec int(10), nombec varchar(25), desbec int(5))
begin
declare existe int;

select trim(nombec) into nombec;
    set nombec= trim(nombec); 
    
    if length(nombec) = 0   then
			select concat("Ingresa nombre de la beca") as mensaje;
		else if desbec = 0 then
        select concat("Ingresa el monto del descuento") as mensaje;
        else     
    
    SELECT COUNT(*) INTO existe FROM becas WHERE 	idBeca = idbec;
        IF existe < 1 THEN
        select concat("este grupo no existe") as mensaje;
        else
        update becas set
         nomBeca= nombec, mondes= desbec where idBeca= idbec;
    
    
        end if;
        end if;
        end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updcur`(IN idcur INT(10), IN ins_idins_cur INT (11), IN nomcur VARCHAR(100), 
IN img VARCHAR(200) ,IN finicur DATE, IN ftercur DATE, IN descur VARCHAR(200), IN coscur DOUBLE (9,2))
BEGIN
	declare existe int;
    declare verificar int;
    
    select trim(nomcur) into nomcur;
    set nomcur= trim(nomcur);
    select trim(img) into img;
    set img= trim(img); 
     select trim(descur) into descur;
    set descur= trim(descur); 
    
    if idcur = 0   then
			select concat("Te hace falta ingresar el id") as mensaje;
		else if ins_idins_cur = 0 then
        select concat("Ingresa ingresa el id del instructor") as mensaje;
        else if length(nomcur) = 0 then
			select concat("Ingresa nombre del curso ") as mensaje;
        else if length(img) = 0 then
			select concat("Ingresa ruta de imagen de curso ") as mensaje;
		else if finicur = 0 then
			select concat("Ingresa fecha de inicio del curso") as mensaje;
		else if ftercur = 0 then
			select concat("Ingresa fecha de termino del curso") as mensaje;
		else if length(descur) = 0 then
			select concat("Ingresa una descripcion del curso") as mensaje;
		else if coscur = 0 then
			select concat("Ingresa el costo del curso") as mensaje;
		else
      
    SELECT COUNT(*) INTO existe FROM cursos WHERE 	idCursos = idcur;
        IF existe < 1 THEN
        select concat("este curso no existe") as mensaje;
        else
		SELECT COUNT(*) INTO verificar FROM instructor WHERE idInstructor = ins_idins_cur;
        IF verificar < 1 THEN
        select concat("El id de instructor numero   ", ins_idins_cur, "  que esta tratando de ingresar no esta registrado") as mensaje;
        else
        update cursos set
        ins_idInstructor= ins_idins_cur,nombre_curso= nomcur, imgCurso= img, fechaInicio= finicur, 
        fechaTermino= ftercur, descripcion= descur, costo= coscur where idCursos= idcur;
    
    
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updesp`(IN id INT(11), IN esp VARCHAR(50), IN des VARCHAR(150))
BEGIN
	declare existe int;
   
    
     select trim(esp) into esp;
     set esp= trim(esp);
     select trim(des) into des;
     set des= trim(des);
    
    If length(esp) = 0   then
		select concat("Debes ingresar la especialidad") as mensaje;
        else If length(des) = 0   then
		select concat("Debes ingresar una descripcion") as mensaje;
        else
		SELECT COUNT(*) INTO existe FROM especialidad WHERE idEspInst = id;
        IF existe < 1 THEN
        select concat("este id no existe") as mensaje;
        else
    
        update especialidad set especialidad= esp, descripcionEsp=des  where idEspInst= id;
    
    
        
        end if;
        end if;
        end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updgpo`(IN idgpo INT(10), IN idcur INT(11), IN idaul INT(11), 
IN idhor INT(11), est varchar(11), IN cup INT(11))
BEGIN
	declare existe int;
    declare curexiste int;
    declare aulexiste int;
    declare horexiste int;
		if idgpo = 0   then
			select concat("Te hace falta ingresar el id") as mensaje;
		else if idcur = 0 then
			select concat("Ingresa ingresa el id del curso") as mensaje;
		else if idaul = 0 then
			select concat("Ingresa ingresa el id del alumno") as mensaje;
		else if idhor = 0 then
			select concat("Ingresa ingresa el id del horario") as mensaje;
		else if cup = 0 then
			select concat("Ingresa el cupo de participantes") as mensaje;
		else
        SELECT COUNT(*) INTO existe FROM grupo WHERE 	idGrupo = idgpo;
        IF existe < 1 THEN
        select concat("este grupo no existe") as mensaje;
		else
        SELECT COUNT(*) INTO curexiste FROM cursos WHERE 	idCursos= idcur;
        IF curexiste < 1 THEN
        select concat("El id del curso   ", idcur, "  que esta tratando de ingresar no esta registrado") as mensaje;
		else
        SELECT COUNT(*) INTO aulexiste FROM aulas WHERE 	idAula= idaul;
        IF aulexiste < 1 THEN
        select concat("El id del aula   ", idaul, "  que esta tratando de ingresar no esta registrado") as mensaje;
        else
        SELECT COUNT(*) INTO horexiste FROM horario WHERE 	idHorario= idhor;
         IF horexiste < 1 THEN
        select concat("El id del horario   ", idhor, "  que esta tratando de ingresar no esta registrado") as mensaje;
        else
        update grupo set
        cursos_idCursos= idcur,aulas_idAula= idaul, horario_idHorario= idhor , 
        estatusGr=est, cupo=cup  where idGrupo= idgpo;
    
    
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updhor`(IN idhor int (10), IN inihor time, IN terhor time, IN diahor varchar(20))
BEGIN
	declare existe int;
    select trim(diahor) into diahor;
    set diahor= trim(diahor);
    
    if idhor = 0 then
			select concat("Ingresa el id del horario ") as mensaje;
        else if inihor = 0 then
			select concat("Ingresa el horario de inicio ") as mensaje;
        else if terhor = 0 then
			select concat("Ingresa el horario de termino ") as mensaje;    
		else if length(diahor) = 0 then
			select concat("Ingresa el dia ") as mensaje;
		else
    SELECT COUNT(*) INTO existe FROM horario WHERE 	idHorario = idhor;
        IF existe < 1 THEN
        select concat("este horario no existe") as mensaje;
        else
        update horario set
        horaInicio= inihor, horaTermino=terhor , 
        dias= diahor  where idHorario= idhor;
    
		
        end if;
        end if;
        end if;
        end if;
        end if;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updins`(IN idins int(11),IN idesp INT(11),IN idtip INT(11), IN idtel INT(11), IN nomins VARCHAR(50),
 IN ap1 VARCHAR(30), IN ap2 VARCHAR(30))
BEGIN
	
    declare existe int;
    declare idespexiste int;
    declare idtipexiste int;
    declare idtelexiste int;
    
    select trim(idins) into idins;
    set idins= trim(idins);
    select trim(nomins) into nomins;
    set nomins= trim(nomins);
    select trim(ap1) into ap1;
    set ap1= trim(ap1);
    select trim(ap2) into ap2;
    set ap2= trim(ap2);
    
    
        if idins = 0 then
			select concat("Ingresa el ID del istructor") as mensaje;
		else if idesp = 0 then
			select concat("Ingresa el id especialidad ") as mensaje;
		else if idtip = 0 then
			select concat("Ingresa el id del tipo de Instructor ") as mensaje;
        else if idtel = 0 then
			select concat("Ingresa el id del telefono ") as mensaje;
		else if length(nomins) = 0 then
			select concat("Ingresa nombre completo del Instructor ") as mensaje;
        else if length(ap1) = 0 then
			select concat("Ingresa el primer apellido ") as mensaje;
		else if length(ap2) = 0 then
			select concat("Ingresa el segundo apellido") as mensaje;
		else
        SELECT COUNT(*) INTO existe FROM instructor WHERE 	IdInstructor = idins;
        IF existe < 1 THEN
        select concat("Este id de instructor no existe") as mensaje;
        else
        SELECT COUNT(*) INTO idespexiste FROM especialidad WHERE 	idEspInst= idesp;
			IF idespexiste < 1 THEN
			select concat("Ese id de especialidad no existe") as mensaje;
		else
        SELECT COUNT(*) INTO idtipexiste FROM tipo WHERE 	idTipInst= idtip;
			IF idtipexiste < 1 THEN
			select concat("Ese id tipo de instructor no existe") as mensaje;
		else
        SELECT COUNT(*) INTO idtelexiste FROM telefono WHERE 	idTel= idtel;
			IF idtelexiste < 1 THEN
			select concat("Ese id de telefono no existe") as mensaje;
		else
        update instructor set especialidadIns_idEspInst = idesp, tipoIns_idTipInst= idtip, telefonoIns_idTel = idtel,
        nombreInstructor=nomins, apellidoI1= ap1, apellidoI2= ap2 where idInstructor=idins ;
        
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
        end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updinsc`(IN `id` INT, IN `gpo` INT, IN `alu` VARCHAR(18), IN `pag` INT)
    NO SQL
BEGIN

    select trim(alu) into alu;
    set alu= trim(alu);
    
        If gpo = 0   then
			select concat("Te hace falta ingresar el id del grupo") as mensaje;
		else if length(alu) = 0 then
			select concat("Ingresa el id del alumno") as mensaje;
		else if pag = 0 then
			select concat("Ingresa el id del pago") as mensaje;
		else
        	UPDATE inscritos SET grupo_idGrupo = gpo, alumnos_curp = alu, pagos_idPago = pag WHERE idInscrito = id; 
        end if;
        end if;
        end if;
        



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updinst`(IN `id` INT(11), IN `gpo` INT(10), IN `alu` VARCHAR(18), IN `pag` INT(11))
BEGIN
	DECLARE existe int;
    DECLARE gpoexiste int;
    DECLARE aluexiste int;
    DECLARE pagexiste int;
    
    
    select trim(alu) into alu;
    set alu= trim(alu);
    
        If id = 0   then
			select concat("Te hace falta ingresar el id ") as mensaje;
        elseIf gpo = 0   then
			select concat("Te hace falta ingresar el id del grupo") as mensaje;
		else if length(alu) = 0 then
			select concat("Ingresa el id del alumno") as mensaje;
		else if pag = 0 then
			select concat("Ingresa el id del pago") as mensaje;
		else
        SELECT COUNT(*) INTO existe FROM inscritos WHERE 	idInscrito= id;
        IF existe < 1 THEN
        select concat("El id del grupo   ", id, "  que esta tratando de ingresar no esta registrado") as mensaje;
        else
        SELECT COUNT(*) INTO gpoexiste FROM grupo WHERE 	idGrupo= gpo;
        IF gpoexiste < 1 THEN
        select concat("El id del grupo   ", gpo, "  que esta tratando de ingresar no esta registrado") as mensaje;
		else
        SELECT COUNT(*) INTO aluexiste FROM alumnos WHERE 	curp= alu;
         IF aluexiste < 1 THEN
        select concat("El id del alumno   ", alu, "  que esta tratando de ingresar no esta registrado") as mensaje;
        else
        SELECT COUNT(*) INTO pagexiste FROM pagos WHERE 	idPago= pag;
         IF pagexiste < 1 THEN
        select concat("El id del pago   ", pag, "  que esta tratando de ingresar no esta registrado") as mensaje;
         else
         IF (SELECT COUNT(*) FROM inscritos WHERE alumnos_curp = alu) > 0 THEN
         	SELECT CONCAT("Esta persona ya esta inscrita a un curso") AS mensaje;
         ELSE
         update inscritos set
        grupo_idGrupo=gpo, alumnos_curp= alu, pagos_idPago= pag  where idInscrito = id ;
         update pagos  set estatusP='Pagado' where idPago= pag; 
        
        end if;
		end if;
        end if; 
        end if;
		end if;
        end if;
        end if;
        end if;
        
        
        
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updpago`(IN idpag INT(10), IN idcur int(10), IN pag DOUBLE(9,2),
 IN fecp DATE, IN est VARCHAR(10))
BEGIN
     declare curexiste int;
     declare mon double(9,2);
	
         if idpag = 0 then
			select concat("Ingrese ID") as mensaje;
		elseif fecp = 0 then
			select concat("Ingrese la fecha de pago") as mensaje;
		else
        SELECT COUNT(*) INTO curexiste FROM cursos WHERE idCursos = idcur;
        IF curexiste < 1 THEN
        select concat("El id  ", idcur, " de curso no existe") as mensaje;
        else  
        select costo into mon from cursos where idCursos= idcur;
		update pagos set
        id_cur= idcur, pago= mon, fechap= fecp, estatusP=est where idpago=idpag;
                
        end if;
        end if;
     
        
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updsol`(IN `solid` INT(10), IN `alusol` VARCHAR(19), IN `solbec` INT(10), IN `solest` VARCHAR(30))
begin
declare existe int;
declare existe2 int;
declare existe3 int;

    select trim(alusol) into alusol;
    set alusol= trim(alusol);
  
			 
             if length(alusol) = 0 then
			select concat("Ingresa curp del alumno ") as mensaje;
        else if solbec = 0 then
			select concat("Ingresa id de la solicitud ") as mensaje;
		else
        
        
        update solbeca set
        solalu= alusol, becsol= solbec, estsol= solest where idSol= solid;
    
    
        
        end if;
        end if;
        
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updtel`(IN id INT(11), IN idtip INT(11), IN tel VARCHAR(20))
BEGIN
	declare existe int;
    declare tipexiste int;
    
     select trim(tel) into tel;
     set tel= trim(tel);
    
    If length(tel) = 0   then
		select concat("Te hace falta ingresar el telefono") as mensaje;
        else
    SELECT COUNT(*) INTO existe FROM telefono WHERE 	idTel = id;
        IF existe < 1 THEN
        select concat("este id no existe") as mensaje;
        else
    SELECT COUNT(*) INTO tipexiste FROM tipotel WHERE 	idTipTel = idtip;
        IF tipexiste < 1 THEN
        select concat("este id de tipo de telefono no existe") as mensaje;
        else
        update telefono set tipoTel_idTipTel= idtip, telefono=tel  where idTel= id;
    
    
        end if;
        end if;
        end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updtip`(IN id INT(11), IN tp VARCHAR(12), IN des VARCHAR(150))
BEGIN
	declare existe int;
   
    
     select trim(tp) into tp;
     set tp= trim(tp);
     select trim(des) into des;
     set des= trim(des);
    
    If length(tp) = 0   then
		select concat("Debes ingresar el tipo de instructor") as mensaje;
        else If length(des) = 0   then
		select concat("Debes ingresar una descripcion") as mensaje;
        else
		SELECT COUNT(*) INTO existe FROM tipo WHERE idTipInst = id;
        IF existe < 1 THEN
        select concat("este id no existe") as mensaje;
        else
    
        update tipo set  descripcionTip=des, tipo= tp where idTipInst= id;
    
    
        
        end if;
        end if;
        end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updtptel`(IN id INT(11), IN tip VARCHAR(50))
BEGIN
	declare existe int;
    
     select trim(tip) into tip;
     set tip= trim(tip);
    
    If length(tip) = 0   then
		select concat("Te hace falta ingresar el tipo de telefono") as mensaje;
        else
    SELECT COUNT(*) INTO existe FROM tipotel WHERE 	idTipTel = id;
        IF existe < 1 THEN
        select concat("este id no existe") as mensaje;
        else
        update tipotel set tipoTelefono= tip where idTipTel= id;
    
    
        end if;
        end if;        
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAdmin` varchar(30) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `nick` varchar(20) DEFAULT NULL,
  `pass` varchar(180) DEFAULT NULL,
  `privilegios` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `nombreAdmin`, `apellidoP`, `apellidoM`, `nick`, `pass`, `privilegios`) VALUES
(1, 'Super', 'Administrador', 'IECA', 'admin', '12345', 1),
(2, 'Administrador', 'Base', 'IECA', 'adminb', '12345', 2),
(3, 'Administrador', 'BASIC', 'IECA', 'adminc', '12345', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `curp` varchar(19) NOT NULL,
  `telefonoAl_idTel` int(11) DEFAULT NULL,
  `nombreAlumno` varchar(50) DEFAULT NULL,
  `apellido1` varchar(30) DEFAULT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `correoAl` varchar(100) DEFAULT NULL,
  `cpAl` int(5) DEFAULT NULL,
  PRIMARY KEY (`curp`),
  KEY `fk_alu_tel` (`telefonoAl_idTel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`curp`, `telefonoAl_idTel`, `nombreAlumno`, `apellido1`, `apellido2`, `correoAl`, `cpAl`) VALUES
('ADFGTYHJUYTREDFRES', 47, 'Alberto', 'Parra', 'Sandobal', 'Alb@mail.com', 31245),
('TAMA981217HGTPNN03', 48, 'Antonio', 'Tapia', 'Montero', 'atm@mail.com', 43124);

--
-- Disparadores `alumnos`
--
DROP TRIGGER IF EXISTS `tg_delAluTel`;
DELIMITER //
CREATE TRIGGER `tg_delAluTel` AFTER DELETE ON `alumnos`
 FOR EACH ROW BEGIN
DELETE FROM telefono WHERE idTel = OLD.telefonoAl_idTel;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tg_updAlumnoTel`;
DELIMITER //
CREATE TRIGGER `tg_updAlumnoTel` BEFORE INSERT ON `alumnos`
 FOR EACH ROW BEGIN
SET NEW.telefonoAl_idTel = (SELECT MAX(idTel) FROM telefono);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `idAula` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAula` varchar(50) DEFAULT NULL,
  `estatusAula` varchar(15) NOT NULL DEFAULT 'Disponible',
  PRIMARY KEY (`idAula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`idAula`, `nombreAula`, `estatusAula`) VALUES
(1, 'UTU', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autbec`
--

CREATE TABLE IF NOT EXISTS `autbec` (
  `idaut` int(10) NOT NULL AUTO_INCREMENT,
  `autsol` int(10) DEFAULT NULL,
  `pagosb_idPago` int(11) DEFAULT NULL,
  `monpag` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`idaut`),
  KEY `fk_aut_sol` (`autsol`),
  KEY `fk_pag_aub` (`pagosb_idPago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `autbec`
--

INSERT INTO `autbec` (`idaut`, `autsol`, `pagosb_idPago`, `monpag`) VALUES
(3, 312, 1, -122811.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas`
--

CREATE TABLE IF NOT EXISTS `becas` (
  `idBeca` int(10) NOT NULL,
  `nomBeca` varchar(25) DEFAULT NULL,
  `mondes` int(5) DEFAULT NULL,
  PRIMARY KEY (`idBeca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becas`
--

INSERT INTO `becas` (`idBeca`, `nomBeca`, `mondes`) VALUES
(1, 'AMLO', 123123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `idCursos` int(10) NOT NULL,
  `ins_idInstructor` int(11) DEFAULT NULL,
  `nombre_curso` varchar(100) DEFAULT NULL,
  `imgCurso` varchar(200) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaTermino` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `costo` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`idCursos`),
  KEY `fk_cur_ins` (`ins_idInstructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idCursos`, `ins_idInstructor`, `nombre_curso`, `imgCurso`, `fechaInicio`, `fechaTermino`, `descripcion`, `costo`) VALUES
(12, 1, 'Cocina', 'uploads/cocina050420113738.jpg', '2020-04-13', '2020-04-30', 'Aprende a cocinar grandes platillos de cocina; desde postres a platillos 5 estrellas y con ello obtener un titulo con el que puedas desempeÃ±arte como chef en un restaurante o en tu propio negocio', 123.00),
(1312, 2, 'Bufandas y Gorros', 'uploads/Bufandas160420102454.jpg', '2020-04-20', '2020-04-09', 'Aprende a cocer bufandas y gorros de manera profesional, obteniendo de esta manera un titulo con el cual desempeÃ±arte, ademas de tener la posibilidad de crear tu propio negocio', 123.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `idEspInst` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(50) DEFAULT NULL,
  `descripcionEsp` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idEspInst`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspInst`, `especialidad`, `descripcionEsp`) VALUES
(1, 'TICS', 'Sabe de pc''s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` int(10) NOT NULL,
  `cursos_idCursos` int(11) DEFAULT NULL,
  `aulas_idAula` int(11) DEFAULT NULL,
  `horario_idHorario` int(11) DEFAULT NULL,
  `estatusGr` varchar(11) DEFAULT 'inactivo',
  `cupo` int(11) DEFAULT '0',
  PRIMARY KEY (`idGrupo`),
  KEY `grupo_ibfk_1` (`cursos_idCursos`),
  KEY `grupo_ibfk_2` (`horario_idHorario`),
  KEY `fk_gru_aul` (`aulas_idAula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `cursos_idCursos`, `aulas_idAula`, `horario_idHorario`, `estatusGr`, `cupo`) VALUES
(1, 12, 1, 1, 'inactivo', 12),
(2, 12, 1, 1, 'inactivo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `idHorario` int(10) NOT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaTermino` time DEFAULT NULL,
  `dias` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `horaInicio`, `horaTermino`, `dias`) VALUES
(1, '11:22:00', '23:00:00', 'Miercoles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE IF NOT EXISTS `inscritos` (
  `idInscrito` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_idGrupo` int(10) DEFAULT NULL,
  `alumnos_curp` varchar(18) DEFAULT NULL,
  `pagos_idPago` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInscrito`),
  KEY `inscritos_ibfk_1` (`grupo_idGrupo`),
  KEY `inscritos_ibfk_2` (`alumnos_curp`),
  KEY `fk_pag_inc` (`pagos_idPago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`idInscrito`, `grupo_idGrupo`, `alumnos_curp`, `pagos_idPago`) VALUES
(2, 1, 'ADFGTYHJUYTREDFRES', 1),
(6, 2, 'TAMA981217HGTPNN03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `idInstructor` int(11) NOT NULL,
  `especialidadIns_idEspInst` int(11) DEFAULT NULL,
  `tipoIns_idTipInst` int(11) DEFAULT NULL,
  `telefonoIns_idTel` int(11) DEFAULT NULL,
  `nombreInstructor` varchar(50) DEFAULT NULL,
  `apellidoI1` varchar(30) DEFAULT NULL,
  `apellidoI2` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idInstructor`),
  KEY `fk_ins_tel` (`telefonoIns_idTel`),
  KEY `fk_ins_esp` (`especialidadIns_idEspInst`),
  KEY `fk_ins_tip` (`tipoIns_idTipInst`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`idInstructor`, `especialidadIns_idEspInst`, `tipoIns_idTipInst`, `telefonoIns_idTel`, `nombreInstructor`, `apellidoI1`, `apellidoI2`) VALUES
(1, 1, 1, 8, 'Antonio', 'Tapia', 'Montero'),
(2, 1, 1, 9, 'Hector', 'Mendoza', 'Sanchez'),
(512, 1, 1, 36, 'Pepe grillo', 'Mendoza', 'Sanchez');

--
-- Disparadores `instructor`
--
DROP TRIGGER IF EXISTS `tg_delInsTel`;
DELIMITER //
CREATE TRIGGER `tg_delInsTel` AFTER DELETE ON `instructor`
 FOR EACH ROW BEGIN
DELETE FROM telefono WHERE idTel = OLD.telefonoIns_idTel;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tg_updInsTel`;
DELIMITER //
CREATE TRIGGER `tg_updInsTel` BEFORE INSERT ON `instructor`
 FOR EACH ROW BEGIN
SET NEW.telefonoIns_idTel = (SELECT MAX(idTel) FROM telefono);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `id_cur` int(10) DEFAULT NULL,
  `pago` double(9,2) DEFAULT NULL,
  `fechaP` date DEFAULT NULL,
  `estatusP` varchar(10) DEFAULT 'No pagado',
  PRIMARY KEY (`idPago`),
  KEY `fk_pag_cur` (`id_cur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idPago`, `id_cur`, `pago`, `fechaP`, `estatusP`) VALUES
(1, 12, 312.00, '2020-04-15', 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solbeca`
--

CREATE TABLE IF NOT EXISTS `solbeca` (
  `idSol` int(10) NOT NULL,
  `solalu` varchar(19) DEFAULT NULL,
  `becsol` int(10) DEFAULT NULL,
  `estsol` varchar(30) DEFAULT 'Sin autorizar',
  PRIMARY KEY (`idSol`),
  KEY `fk_sol_alu` (`solalu`),
  KEY `fk_sol_bec` (`becsol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solbeca`
--

INSERT INTO `solbeca` (`idSol`, `solalu`, `becsol`, `estsol`) VALUES
(312, 'ADFGTYHJUYTREDFRES', 1, 'Sin autorizar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE IF NOT EXISTS `telefono` (
  `idTel` int(11) NOT NULL AUTO_INCREMENT,
  `tipoTel_idTipTel` int(11) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT '() - -',
  PRIMARY KEY (`idTel`),
  KEY `fk_tel_tip` (`tipoTel_idTipTel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`idTel`, `tipoTel_idTipTel`, `telefono`) VALUES
(8, 1, '1234561260'),
(9, 1, '1234512345'),
(36, 1, '1123124562'),
(47, 1, '6123124561'),
(48, 2, '4123123410');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipInst` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(12) DEFAULT NULL,
  `descripcionTip` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTipInst`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipInst`, `tipo`, `descripcionTip`) VALUES
(1, 'Nomina', 'De planta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotel`
--

CREATE TABLE IF NOT EXISTS `tipotel` (
  `idTipTel` int(11) NOT NULL AUTO_INCREMENT,
  `tipoTelefono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTipTel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipotel`
--

INSERT INTO `tipotel` (`idTipTel`, `tipoTelefono`) VALUES
(1, 'Celular'),
(2, 'Casa');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`telefonoAl_idTel`) REFERENCES `telefono` (`idTel`);

--
-- Filtros para la tabla `autbec`
--
ALTER TABLE `autbec`
  ADD CONSTRAINT `autbec_ibfk_1` FOREIGN KEY (`autsol`) REFERENCES `solbeca` (`idSol`),
  ADD CONSTRAINT `autbec_ibfk_2` FOREIGN KEY (`pagosb_idPago`) REFERENCES `pagos` (`idPago`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_inst_curs` FOREIGN KEY (`ins_idInstructor`) REFERENCES `instructor` (`idInstructor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`cursos_idCursos`) REFERENCES `cursos` (`idCursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`horario_idHorario`) REFERENCES `horario` (`idHorario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_3` FOREIGN KEY (`aulas_idAula`) REFERENCES `aulas` (`idAula`);

--
-- Filtros para la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`grupo_idGrupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscritos_ibfk_2` FOREIGN KEY (`alumnos_curp`) REFERENCES `alumnos` (`curp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscritos_ibfk_3` FOREIGN KEY (`pagos_idPago`) REFERENCES `pagos` (`idPago`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`telefonoIns_idTel`) REFERENCES `telefono` (`idTel`),
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`especialidadIns_idEspInst`) REFERENCES `especialidad` (`idEspInst`),
  ADD CONSTRAINT `instructor_ibfk_3` FOREIGN KEY (`tipoIns_idTipInst`) REFERENCES `tipo` (`idTipInst`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pag_cur` FOREIGN KEY (`id_cur`) REFERENCES `cursos` (`idCursos`);

--
-- Filtros para la tabla `solbeca`
--
ALTER TABLE `solbeca`
  ADD CONSTRAINT `solbeca_ibfk_1` FOREIGN KEY (`solalu`) REFERENCES `alumnos` (`curp`),
  ADD CONSTRAINT `solbeca_ibfk_2` FOREIGN KEY (`becsol`) REFERENCES `becas` (`idBeca`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`tipoTel_idTipTel`) REFERENCES `tipotel` (`idTipTel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
