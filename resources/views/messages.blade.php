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
					echo('<p class="text-right">');//côté droit
				}else {
					//côté gauche
                    echo('<p class="text-left">');//côté droit
				}
				echo(session()->get('messages')[$i][$j]->text.'</br>'.'<hr width="100%" color="black" style="border-width: 1px;">');
			}
			?>
        <br/>
        <br/>
			<form method="post">
				{{csrf_field()}}
                <?php
				echo('<input type="hidden" name="conversationID" value="'.session()->get('conversations')[$i]->ID.'">
				<input type="hidden" name="whoRU" value="started">
				<input type="text" class="text-center" required="required" name="message" placeholder="Votre message">
				<input type="submit" required="required" value"Envoyer"></form>'.'</br>');
				?>
			</br>
			</br>
			</br>
			<?php
		}
	?>
            </form>
    </div>
    </div>
    </div>
	<p> Souhaitez-vous entammer une discussion ? </p>
	<form method="post">
	{{csrf_field()}}
		<input type="hidden" name="whoRU" value="starting">
		Email de votre interlocuteur : <input type="email" name="email" required="required" placeholder="exemple@gmail.com"></br>
		Votre message : <input type="text" name="text" required="required" placeholder="Bonjour !"></br>
		<input type="submit" required="required" value"Envoyer"></form>
	</form>

</br>
</br>
@endsection
