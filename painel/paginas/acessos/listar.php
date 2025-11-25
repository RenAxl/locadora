<?php 

echo <<<HTML
<small>
	<table class="table table-hover" id="tabela">
		<thead> 
			<tr>
				<th>Nome</th>	
				<th>Chave</th>	
				<th>Grupo</th>
				<th>Ações</th>
			</tr> 
		</thead> 

		<tbody>	
			<tr>
				<td>Usuários</td>
				<td>usuarios</td>
				<td>Cadastros</td>
				<td>
					<big>
						<a href="#" title="Editar">
							<i class="fa fa-edit text-primary"></i>
						</a>
					</big>
					|
					<big>
						<a href="#" title="Excluir">
							<i class="fa fa-trash-o text-danger"></i>
						</a>
					</big>
				</td>
			</tr>

			<tr>
				<td>Clientes</td>
				<td>clientes</td>
				<td>Cadastros</td>
				<td>
					<big>
						<a href="#" title="Editar">
							<i class="fa fa-edit text-primary"></i>
						</a>
					</big>
					|
					<big>
						<a href="#" title="Excluir">
							<i class="fa fa-trash-o text-danger"></i>
						</a>
					</big>
				</td>
			</tr>

			<tr>
				<td>Produtos</td>
				<td>produtos</td>
				<td>Estoque</td>
				<td>
					<big>
						<a href="#" title="Editar">
							<i class="fa fa-edit text-primary"></i>
						</a>
					</big>
					|
					<big>
						<a href="#" title="Excluir">
							<i class="fa fa-trash-o text-danger"></i>
						</a>
					</big>
				</td>
			</tr>
		</tbody>
	</table>
</small>
HTML;

?>
