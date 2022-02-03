<table class="tg">
                    <thead>
                      <tr>
                        <th class="tg-9wq8" rowspan="2">MATERIAL CODE</th>
                        <th class="tg-9wq8" rowspan="2">DESCRIPTION</th>
                        <th class="tg-baqh" colspan="3">REQUESTION</th>
                        <th class="tg-baqh" colspan="2">ISSUE QTY</th>
                        <th class="tg-baqh" colspan="2">STOCK</th>
                        <th class="tg-baqh" colspan="4">FOR ACCOUNT DEPT</th>
                      </tr>
                      <tr>
                        <th class="tg-0lax">CHARGE TO</th>
                        <th class="tg-0lax">QTY</th>
                        <th class="tg-0lax">UOM</th>
                        <th class="tg-0lax">Luas Ha</th>
                        <th class="tg-0lax">Dosage</th>
                        <th class="tg-0lax">BEGIN</th>
                        <th class="tg-0lax">END</th>
                        <th class="tg-0lax">PRICE</th>
                        <th class="tg-0lax">TTL AMOUNT</th>
                        <th class="tg-0lax">ACCOUNT</th>
                        <th class="tg-0lax">REMARKS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="tg-0lax">
                          <div class="form-group select2div">
                            <label for=""><b class="number">1.</b> MATERIAL KODE</label>
                            <select style="width: 100%" class="form-control select2 select-material" style="display: block;">
                              <option value="">Pilih Material</option>
                              @foreach (App\mdlMaterial::all() as $material)
                                <option value="{{ $material->id }}" urut="1" deskripsi="{{ $material->deskripsi }}">{{ $material->material_code.' ('.$material->deskripsi.')' }}</option> 
                              @endforeach
                            </select>
                            <br>
                            <p class="pdes"></p>
                          </div>
                        </td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax">
                          <div class="form-group select2div3">
                            <label for="">CHARGE TO</label>
                            <select style="width: 100%" class="form-control select2 select-block" style="display: block;">
                              <option value="">Pilih ..</option>
                              @foreach (App\mdlBlock::all() as $block)
                                <option value="{{ $block->id }}" urut="1" deskripsi="{{ $block->ha }}">{{ $block->block.' - '.$block->ha }}</option> 
                              @endforeach
                            </select>
                            <br>
                            <p class="pblock"></p>
                          </div>
                        </td>
                        <td class="tg-0lax">
                          <input type="number" class="form-control inputtext">
                        </td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax"></td>
                        <td class="tg-0lax">
                          <select style="width: 100%" class="form-control select2 select-gl" style="display: block;">
                            <option value="">Pilih Account</option>
                            @foreach (App\mdlGl::all() as $gl)
                              <option value="{{ $gl->id }}" urut="1" deskripsi="{{ $gl->deskripsi }}">{{ $gl->kode.' ('.$gl->deskripsi.')' }}</option> 
                            @endforeach
                          </select>
                        </td>
                        <td class="tg-0lax"></td>
                      </tr>
                      
                    </tbody>
                    </table>