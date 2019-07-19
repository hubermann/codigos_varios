class CreateQuestions < ActiveRecord::Migration[5.2]
  def change
    create_table :questions do |t|
      t.belongs_to :questionarie, index: true
      t.string :label
      t.integer :votes
    end
  end
end
