<?php

require_once 'Produto.php';



    // try
    // {
    //   $Produto = new Produto();
    //   $Produto->setNome('Teste');
    //   $Produto->setValor('10.50');
    //   $Produto->setIdCliente(1);
    //   $Produto->create(); //PK is auto-incremented
    //   $id=$Produto->getId();// return autoincremented PK
    // }
    // catch(CreateException $e)
    // {
    //   print("<pre>");print_r($e);print("</pre>");
    //   exit();
    // }


    try
    {
      $Produto=new Produto();

      $Produto->readAll();
      print("<pre>");print_r($Produto);print("</pre>");
    }
    catch(ReadException $e)
    {
        print("<pre>");print_r($e);print("</pre>");
        exit();
    }

?>