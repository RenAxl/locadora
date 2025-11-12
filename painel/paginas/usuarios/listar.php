<?php

echo <<<HTML
<small>
  <table class="table table-hover" >
    <thead>
      <tr>
        <th>Nome</th>
        <th class="esc">Telefone</th>
        <th class="esc">Email</th>
        <th class="esc">Nível</th>
        <th class="esc">Foto</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <input type="checkbox"  class="form-check-input">
        Exemplo
        </td>
        <td class="esc">(31) 99999-9999</td>
        <td class="esc">exemplo@teste.com</td>
        <td class="esc">Admin</td>
        <td class="esc"><img src="images/perfil/sem-foto.jpg" width="25px"></td>
        <td>
	          <big><a href="#" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

		        <a href="#" title="Excluir usuário" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

            <big><a href="#" title="Mostrar Dados"><i class="fa fa-info-circle text-primary"></i></a></big>
            
            <big><a href="#" title="Ativar usuário"><i class="fa fa-check-square"></i></a></big>

            <big><a class="" href="#" title="Dar Permissões"><i class="fa fa-lock text-primary"></i></a></big>

        </td>      
</tr>
    </tbody>
  </table>
</small>
HTML;

?>