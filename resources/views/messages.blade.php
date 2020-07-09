@extends ('layouts.layout')

    <!-- View message -->
@section('contenu')
    </br>
    </br>
    <div class="row">
        <div class="border mb-6 mt-6 mr-auto ml-auto col-7 text-center" style="border: black 5px">
	<?php
		for($i=0; $i<session()->get('conversations_count'); $i++){
			if(session()->get('conversations')[$i]->ID_USERS_ONE == Auth::user()->id){
				$interlocutor = session()->get('conversations')[$i]->ID_USERS_TWO;
			}else{
				$interlocutor = session()->get('conversations')[$i]->ID_USERS_ONE;
			}
			$interlocutor = DB::table('users')->where('id', $interlocutor)->get();
			echo('<p class="font">'.'<hr width="100%" color="black" style="border-width: 8px;">'.'</br>'.$interlocutor[0]->name.' '.$interlocutor[0]->first_name.'</p>'.'</br>'.'<hr width="85%" color="#C0C0C0" style="border-width: 6px;">'.'</br>');
			?>
        <?php
			for($j = 0; $j<count(session()->get('messages')[$i]); $j++){
				if(session()->get('messages')[$i][$j]->ID_SENDER == Auth::user()->id){
					echo('Vous : ');//côté droit
				}else {
					//côté gauche
				}
				echo(session()->get('messages')[$i][$j]->text.'</br>'.'<hr width="60%" color="black" style="border-width: 3px;">');
			}
			?>
        <br/>
        <br/>
			<form method="post">
				{{csrf_field()}}
                <?php
				echo('<input type="hidden" name="conversationID" value="'.session()->get('conversations')[$i]->ID.'">
				<input type="text" class="text-center" name="message" placeholder="Votre message">
				<input type="submit" value"Envoyer"></form>'.'</br>');
				?>
			</br>
			</br>
			</br>
			<form method="post">
				{{csrf_field()}}
			</form>
			<?php
		}
	?>
            </form>
    </div>
    </div>
    </div>


</br>
</br>
@endsection
