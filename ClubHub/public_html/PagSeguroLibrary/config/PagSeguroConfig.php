<?php
/**
 * 2007-2014 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 *Licensed under the Apache License, Version 2.0 (the "License");
 *you may not use this file except in compliance with the License.
 *You may obtain a copy of the License at
 *
 *http://www.apache.org/licenses/LICENSE-2.0
 *
 *Unless required by applicable law or agreed to in writing, software
 *distributed under the License is distributed on an "AS IS" BASIS,
 *WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *See the License for the specific language governing permissions and
 *limitations under the License.
 *
 *  @author    PagSeguro Internet Ltda.
 *  @copyright 2007-2014 PagSeguro Internet Ltda.
 *  @license   http://www.apache.org/licenses/LICENSE-2.0
 */

$PagSeguroConfig = array();

$PagSeguroConfig['environment'] = "sandbox"; // production, sandbox

$PagSeguroConfig['credentials'] = array();
$PagSeguroConfig['credentials']['email'] = "marco_oliveira94@live.com";

//Sandbox = Teste

$PagSeguroConfig['credentials']['token']['sandbox'] = "30DD2E8C334044028EC28C6B67BC23B1";
$PagSeguroConfig['credentials']['appId']['sandbox'] = "app9133204524";
$PagSeguroConfig['credentials']['appKey']['sandbox'] = "F858B78005053626648A6FB68625147C";


//Production = Produção
///*
// $PagSeguroConfig['credentials']['token']['production'] = "4B37E12B0375433F92340D5A37EDFE2E";
// $PagSeguroConfig['credentials']['appId']['production'] = "sbrate";
// $PagSeguroConfig['credentials']['appKey']['production'] = "344AD087414179A22441DF9299390ABF";
//*/

$PagSeguroConfig['application'] = array();
$PagSeguroConfig['application']['charset'] = "UTF-8"; // UTF-8, ISO-8859-1

$PagSeguroConfig['log'] = array();
$PagSeguroConfig['log']['active'] = false;
// Informe o path completo (relativo ao path da lib) para o arquivo, ex.: ../PagSeguroLibrary/logs.txt
$PagSeguroConfig['log']['fileLocation'] = "";