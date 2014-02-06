class RemoveClassroomFromStudents < ActiveRecord::Migration
  def change
    remove_reference :students, :classroom, index: true
  end
end
