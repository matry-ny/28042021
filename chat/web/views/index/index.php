<?php

use models\RoomEntity;

/**
 * @var RoomEntity[] $rooms
 */

?>
<div class="messaging">
    <div class="inbox_msg">
        <div class="inbox_people">
            <div class="headind_srch">
                <div class="recent_heading">
                    <h4>Rooms <a href="/rooms/create" class="btn btn-success btn-sm float-end">Add room</a></h4>
                </div>
            </div>
            <div class="inbox_chat">
                <?php foreach ($rooms as $room) : ?>

                <div class="chat_list" data-room-id="<?= $room->id ?>">
                    <div class="chat_people">
                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="chat_ib">
                            <h5><?= $room->title ?> <span class="chat_date"><?= (new DateTime($room->created_at))->format('M d') ?></span></h5>
                            <p>Test, which is a new approach to have all solutions
                                astrology under one roof.</p>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="mesgs">
            <div class="msg_history"></div>
            <div class="type_msg">
                <div class="input_msg_write">
                    <input type="text" class="write_msg" placeholder="Type a message" />
                    <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>


    <p class="text-center top_spac"> Design by <a target="_blank" href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p>

</div>