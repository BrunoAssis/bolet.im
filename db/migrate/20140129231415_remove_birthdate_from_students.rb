class RemoveBirthdateFromStudents < ActiveRecord::Migration
  def change
    remove_column :students, :birthdate, :date
  end
end
