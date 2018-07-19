DELIMITER $$
CREATE PROCEDURE `sp_edita_saida` (
pdtsaida varchar(100),
pnumvalor float,
pnumdocumento varchar(20),
pdestipopag varchar(45),
pdesgasto varchar(45),
pdesdocumento varchar(45),
pid int
)
BEGIN

UPDATE `bd_iadt`.`tb_fin_saidas`
SET
`dtsaida` = pdtsaida,
`numvalor` = pnumvalor,
`numdocumento` = pnumdocumento,
`destipopag` = pdestipopag,
`desgasto` = pdesgasto,
`desdocumento` =pdesdocumento
WHERE `idsaida` = pid;


select * from tb_fin_saidas where idsaida=pidsp_delete_usuario;

END $$
DELIMITER ;