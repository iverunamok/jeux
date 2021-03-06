<div id="lb{{ $index }}" class="item-full">

  <div class="item-content">
    <img src="{{ $game['image'] }}" alt="game"></img>
    <div class="item-info">
      <h4><strong>description</strong></h4>
      <p>{{ $game['description']}}</p>
      <h5><strong>Players</strong></h5>
      @if($game['min_player'] === $game['max_player'])
        <p>{{ $game['max_player'] }}</p>
      @else
        <p>{{ $game['min_player'] }}-{{ $game['max_player'] }}</p>
      @endif
      <h5><strong>Age</strong></h5>
      <p>{{ $game['min_age']}}+</p>
      <h5><strong>Play Time</strong></h5>
      @if($game['min_play'] === $game['max_play'])
        <p>{{ $game['max_play'] }} minutes</p>
      @else
        <p>{{ $game['min_play'] }}-{{ $game['max_play'] }} minutes</p>
      @endif
    </div>
    @if(!$game['own_game'])
      {!! Form::open(['action'=>['InventoryController@store', 'game_id' => $game['game_id'], 'user_id'=>Auth::user()->id]]) !!}
      {!! Form::button('Add', ['type' => 'submit', 'class' => "btn btn-primary", 'dusk' => 'add-game']) !!}
      {!! Form::close() !!}
    @else
      {!! Form::open(['_method' => 'delete', 'action'=>['InventoryController@destroy', 'game_id' => $game['game_id'], 'user_id'=>Auth::user()->id]]) !!}
      {!! Form::button('Remove', ['type' => 'submit', 'class' => "btn btn-danger", 'dusk' => 'remove-game']) !!}
      {!! Form::close() !!}
    @endif
  </div>
  @component('partials.item-owner-index', ['owners'=>$game['owner'], 'game_id'=>$game['game_id']])
  @endcomponent
</div>
