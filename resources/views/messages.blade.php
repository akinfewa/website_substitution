@extends ('layouts.layout')

@section('contenu')
	<?php
		for($i=0; $i<session()->get('conversations_count'); $i++){
			if(session()->get('conversations')[$i]->ID_USERS_ONE == Auth::user()->id){
				$interlocutor = session()->get('conversations')[$i]->ID_USERS_TWO;
			}else{
				$interlocutor = session()->get('conversations')[$i]->ID_USERS_ONE;
			}
			$interlocutor = DB::table('users')->where('id', $interlocutor)->get();
			echo('<p>'.$interlocutor[0]->name.' '.$interlocutor[0]->first_name.'</p>');
			for($j = 0; $j<count(session()->get('messages')[$i]); $j++){
				if(session()->get('messages')[$i][$j]->ID_SENDER == Auth::user()->id){
					echo('Vous : ');
				}
				echo(session()->get('messages')[$i][$j]->text.'</br>');
			}
			?> 
			<form method="post">
				{{csrf_field()}} <?php
				echo('<input type="hidden" name="conversationID" value="'.session()->get('conversations')[$i]->ID.'">
				<input type="text" name="message" placeholder="votre message">
				<input type="submit" value"Envoyer">
			</form>');?>
			</br>
			</br>
			</br>
			<?php
		}
	?>

@endsection