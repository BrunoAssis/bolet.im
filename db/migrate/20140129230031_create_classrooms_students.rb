class CreateClassroomsStudents < ActiveRecord::Migration
  def change
    create_table :classrooms_students, id: false do |t|
      t.references :classroom
      t.references :student
    end

    add_index(:classrooms_students, [ :classroom_id, :student_id ])
  end
end
