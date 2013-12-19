class CreateGrades < ActiveRecord::Migration
  def change
    create_table :grades do |t|
      t.references :school, index: true
      t.references :student, index: true
      t.references :teacher_class, index: true
      t.decimal :grade

      t.timestamps
    end
  end
end
