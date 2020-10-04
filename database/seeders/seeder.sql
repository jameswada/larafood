--select * from plans
insert plans (name, url, price, description) values (
	'Basico', 'basico',10.50, 'plano inicial') 
insert plans (name, url, price, description) values (
	'Pro', 'Profissional',20.50, 'plano desenvolvedor') 
insert plans (name, url, price, description) values (
	'Empresarial', 'Empresarial',330.50, 'plano empresas')
insert plans (name, url, price, description) values (
	'Premium', 'Premium',555.55, 'plano premium')

--select * from detail_plan
insert detail_plan ( plan_id , name ) values ( 
	1, 'detalhe 1.1' ) 
insert detail_plan ( plan_id , name ) values ( 
	1, 'detalhe 1.2' ) 
insert detail_plan ( plan_id , name ) values ( 
	1, 'detalhe 1.3' ) 
	insert detail_plan ( plan_id , name ) values ( 
	2, 'detalhe 2.1' ) 
insert detail_plan ( plan_id , name ) values ( 
	2, 'detalhe 2.2' ) 

-- select * from profiles
insert profiles (name, description ) values ('master', 'proprietario') 
insert profiles (name, description ) values ('admin', 'administrador') 
insert profiles (name, description ) values ('operador', 'operador') 
insert profiles (name, description ) values ('gerente', 'supervisor' ) 

