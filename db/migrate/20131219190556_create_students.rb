class CreateStudents < ActiveRecord::Migration
  def change
    create_table :students do |t|
      t.references :school, index: true
      t.references :user, index: true     
      t.references :classroom, index: true
      t.string :name
      t.date :birthdate

      t.timestamps
    end
  end
end
