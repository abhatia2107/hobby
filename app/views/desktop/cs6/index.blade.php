@extends('Layouts.layout')
@section('pagestylesheet')
    <style type="text/css">
        .booknowButton, .booknowButton:hover, .booknowButton button:active { background: #3396d1;margin-top: 5px;padding: 5px 25px 5px 25px;border-radius: 0px;border:0px solid;text-align: center; }
        .batchOrderButtons { text-align: center;color: white}
        .batchOrderField {margin-bottom: 4px;}
        .batchOrderField button { border:0px;background-color: #3aa54c;font-size: 15px;color: white;height:30px;padding: 4px;margin-top: 5px; }
        .membership_page_container { margin-top: 20px; font-family: 'Open Sans',sans-serif;color: #333;}

        .membership_page_item {padding: 0px 14px;}

        .membership_card_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
            box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 5px 5px 5px 5px;margin-bottom: 10px;
        }

        .membership_card { background: url("/assets/images/home/hobbyix_membership_card.gif");background-repeat:no-repeat;background-position:left top;-o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;-webkit-background-size: 100% 100%, auto;background-size: 100% 100%, auto;height: 200px;
        }

        .membership_features_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
            box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 7px 20px 15px 20px;margin-bottom: 10px;
        }

        .header{  padding: 0px 15px 5px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 25px;text-align: center;}

        .membership_features_container li { font-size: 18px;margin-bottom: 15px;}

        li { font-size: 18px;margin-bottom: 5px;}

        .membership_features_container .glyphicon{color: #20cfb1;margin-right: 7px;}

        .page_height_footer {margin-top: 40px;}

        @media (min-width: 920px) { .get_membership li {padding: 0 20px}}

        .membership_card_container input[type=text] { height: 25px; padding: 0px 0px 0px 5px; width: 90%; border-radius: 2px; }

        .get_membership hr {margin: 10px 15px 5px 15px;}
    </style>
@stop
@section('content')
    <div class="container" style="padding-top: 20px;">
        <div class="col-md-6">
            <img src="{{asset('/assets/images/cs6/poster.jpg')}}" class="img-responsive">
            <div class="text-center">
                <h3>Registrations Starting Soon...</h3>
            {{--<a href="{{url('cs6')}}"><button class="btn btn-primary">Create a new Team</button></a>
            <a href="{{url('cs6')}}"><button class="btn btn-primary">Join an existing Team</button></a>--}}
            </div>
        </div>
        <div class="col-md-6 membership_features_container">
            <h3 class="header">
                Hobbyix Cric Super6 Highlights
            </h3>
            <h4>
                <ul class="membership_features">
                    <li><span class="glyphicon glyphicon-hand-right"></span>All Matches will be played on astro-turf pitch with lush green fast outfield</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Matches will happen both during Day &amp; Night time</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Winning team will get a whooping prize of Rs. 25000/-</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>DJ, commentary &amp; Flood-lights to electrify the atmosphere </li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Live Telecast of Semi-Final &amp; Final match on hobbyix.com</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Scores will be updated online and audience can guess the winners/man of the match to win exciting prizes</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>All matches will be supervised by professional umpires &amp; referees</li>
                </ul>
            </h4>
        </div>
        <div class="col-md-6 membership_features_container">
            <h3 class="header">
                Hobbyix Cric Super6 Rules
            </h3>
            <h4>
                <ul class="membership_features">
                    <li><span class="glyphicon glyphicon-hand-right"></span>Each team will be of six players and each player can be a part of any number of teams</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>In case you don't have a team then we will form one for you</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Only off-side and straight areas for scoring runs</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Every match is of 6 overs and over limit for bowlers is 2 per bowler</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Registration fee is Rs. 2500/- per team and Rs. 450/- for individuals</li>
                    <li><span class="glyphicon glyphicon-hand-right"></span>Special awards for maximum number of dot balls (for bowler) &amp; maximum number of sixes (for batsman)</li>
                </ul>
            </h4>
        </div>
@stop
