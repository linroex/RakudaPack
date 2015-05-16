<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新增任務</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="mission">任務名稱（30字內）</label>
                    <input type="text" class="form-control" id="mission" placeholder="簡短描述任務名稱">
                </div>
                <div class="form-group">
                    <label for="where">面交地點</label>
                    <input type="text" class="form-control" id="where" placeholder="請輸入校園地點（如：體育館2樓），並點選下列地圖">
                </div>
                <div class="form-group">
                    <label for="when">面交時間</label>
                    <input type="time" name="when" class="form-control" placeholder="請輸入「與對方面交」的時間">
                </div>
                <div class="form-group">
                    <label for="point">點數</label>
                    <select class="form-control">
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>25</option>
                        <option>30</option>
                        <option>35</option>
                        <option>40</option>
                        <option>45</option>
                        <option>50</option>
                    </select>
                </div>
                <div>
                    <label for="point">備註</label>
                    <textarea name="other" class="form-control" placeholder="備註" id="other" cols="30" rows="10"></textarea>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">預覽</button>
                <button type="button" class="btn btn-primary">送出</button>
            </div>
        </div>
    </div>                      
</div>