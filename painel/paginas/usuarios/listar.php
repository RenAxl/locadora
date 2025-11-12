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
      <!-- Exemplo de linha estática só para ver a tabela renderizar -->
      <tr>
        <td>Exemplo</td>
        <td class="esc">(31) 99999-9999</td>
        <td class="esc">exemplo@teste.com</td>
        <td class="esc">Admin</td>
        <td class="esc">-</td>
        <td>-</td>
      </tr>
    </tbody>
  </table>
</small>
HTML;

?>