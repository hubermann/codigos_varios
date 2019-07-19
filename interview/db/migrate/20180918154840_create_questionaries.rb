class CreateQuestionaries < ActiveRecord::Migration[5.2]
  def change
    create_table :questionaries do |t|
      t.belongs_to :check_in, index: true
      t.string :label
    end
  end
end
